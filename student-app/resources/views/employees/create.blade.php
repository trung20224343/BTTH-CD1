@extends('layouts.master')

@section('title', 'Thêm nhân viên')

@section('content')
    <h2>Thêm nhân viên mới</h2>
    <form method="POST" action="{{ route('employees.store') }}">
        @csrf
        <p>Tên: <input type="text" name="name" required></p>
        <p>Email: <input type="email" name="email" required></p>
        <p>Chức vụ: <input type="text" name="position" required></p>
        <button type="submit">Lưu lại</button>
    </form>
@endsection