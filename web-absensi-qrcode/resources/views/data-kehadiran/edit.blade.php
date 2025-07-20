@extends('layouts.app')

@section('content')
    <div class="container">
        @if(isset($studentAttendances) && isset($course))
            <h1>Data Kehadiran</h1>
            <h2>Mata Kuliah: {{ $course->name }} ({{ $course->lecturer }})</h2>

            @if(session('success'))
                <div style="color: green; margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('dashboard') }}" class="btn btn-back">Kembali ke Dashboard</a>
            <a href="{{ route('qrcode.generate', $course->id) }}" class="btn">Tampilkan QR Code</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Mahasiswa</th>
                        <th>NPM</th>
                        <th>Status</th>
                        <th>Waktu Hadir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($studentAttendances as $record)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $record['student']->name }}</td>
                            <td>{{ $record['student']->npm }}</td>
                            <td>{{ $record['status'] }}</td>
                            <td>{{ $record['check_in_time'] }}</td>
                            <td>
                                <form action="{{ route('attendances.update.status', ['attendance' => $record['attendance_id']]) }}" method="POST">
                                    @csrf
                                    
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="Hadir" {{ $record['status'] == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                                        <option value="Izin" {{ $record['status'] == 'Izin' ? 'selected' : '' }}>Izin</option>
                                        <option value="Alpha" {{ $record['status'] == 'Alpha' ? 'selected' : '' }}>Alpha</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if(count($studentAttendances) == 0)
                        <tr>
                            <td colspan="6">Tidak ada data mahasiswa yang terdaftar.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        @else
            <p>Tidak ada data yang ditampilkan.</p>
        @endif
    </div>
@endsection