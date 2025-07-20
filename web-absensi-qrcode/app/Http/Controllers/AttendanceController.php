<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Menampilkan daftar kehadiran untuk mata kuliah tertentu.
     */
    public function showAttendanceByCourse(Course $course)
    {
        $students = Student::all();
        $attendances = Attendance::where('course_id', $course->id)->get();

        $studentAttendances = [];
        foreach ($students as $student) {
            $attendanceRecord = $attendances->firstWhere('student_id', $student->id);

            $studentAttendances[] = [
                'student' => $student,
                'status' => $attendanceRecord ? $attendanceRecord->status : 'Alpha',
                'check_in_time' => $attendanceRecord ? $attendanceRecord->check_in_time : null,
                'attendance_id' => $attendanceRecord ? $attendanceRecord->id : null,
            ];
        }

        // Diperbaiki: Menggunakan view 'data-kehadiran.index' karena folder 'attendances' tidak ada
        return view('data-kehadiran.show', compact('course', 'studentAttendances'));
    }

    public function editAttendanceByCourse(Course $course)
    {
        $students = Student::all();
        $attendances = Attendance::where('course_id', $course->id)->get();

        $studentAttendances = [];
        foreach ($students as $student) {
            $attendanceRecord = $attendances->firstWhere('student_id', $student->id);

            $studentAttendances[] = [
                'student' => $student,
                'status' => $attendanceRecord ? $attendanceRecord->status : 'Alpha',
                'check_in_time' => $attendanceRecord ? $attendanceRecord->check_in_time : null,
                'attendance_id' => $attendanceRecord ? $attendanceRecord->id : null,
            ];
        }

        // Diperbaiki: Menggunakan view 'data-kehadiran.index' karena folder 'attendances' tidak ada
        return view('data-kehadiran.edit', compact('course', 'studentAttendances'));
    }

    /**
     * Memperbarui status kehadiran untuk record kehadiran tertentu.
     */
    public function updateAttendanceStatus(Request $request, Attendance $attendance)
    {
        $request->validate([
            'status' => 'required|in:Hadir,Izin,Alpha',
        ]);

        $attendance->status = $request->input('status');

        if ($request->input('status') == 'Hadir' && is_null($attendance->check_in_time)) {
            $attendance->check_in_time = Carbon::now();
        } 
        
        $attendance->save();

        return redirect()->route('attendances.edit', ['course' => $attendance->course_id])
                         ->with('success', 'Status kehadiran berhasil diperbarui!');
    }

    /**
     * Logika untuk mencatat kehadiran via scan QR Code.
     */
    public function scanQRcode(Request $request, $code)
    {
        $request->validate([
            'student_npm' => 'required|string|exists:students,npm',
        ]);

        $course = Course::where('code', $code)->first();
        if (!$course) {
            return response()->json(['message' => 'QR Code tidak valid.'], 404);
        }

        $student = Student::where('npm', $request->student_npm)->first();

        $todayAttendance = Attendance::where('student_id', $student->id)
                                    ->where('course_id', $course->id)
                                    ->whereDate('check_in_time', Carbon::today())
                                    ->first();

        if ($todayAttendance && $todayAttendance->status == 'Hadir') {
            return response()->json(['message' => 'Anda sudah presensi untuk mata kuliah ini hari ini.'], 200);
        }

        $attendance = $todayAttendance ?? new Attendance();
        $attendance->student_id = $student->id;
        $attendance->course_id = $course->id;
        $attendance->status = 'Hadir';
        $attendance->check_in_time = Carbon::now();
        $attendance->save();

        return response()->json(['message' => 'Presensi berhasil dicatat!'], 201);
    }
}