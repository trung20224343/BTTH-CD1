@extends('layouts.master')

@section('title', 'Trang Dashboard')

@section('content')
    <h1>Bảng điều khiển thống kê</h1>

    <div style="border: 1px solid #000; padding: 15px; margin-bottom: 10px;">
        <p>Tổng số nhân viên: {{ $totalEmp }}</p>
    </div>

    <div style="border: 1px solid #000; padding: 15px; margin-bottom: 10px;">
        <p>Tổng số phòng ban: {{ $totalDep }}</p>
    </div>

    <h3>Danh sách 5 nhân viên mới nhất:</h3>
    <ul>
        @foreach($newEmp as $e)
            <li>{{ $e->name }} - {{ $e->email }}</li>
        @endforeach
    </ul>

    <a href="{{ route('employees.index') }}">Quay lại danh sách nhân viên</a>
@endsection