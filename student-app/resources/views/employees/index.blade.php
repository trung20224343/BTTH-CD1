@extends('layouts.master')

@section('title', 'Danh sách nhân viên phân trang')

@section('content')
    <h2>Danh sách nhân viên</h2>
    
    <a href="{{ route('employees.create') }}" style="display: inline-block; margin-bottom: 15px;">
        + Thêm nhân viên mới
    </a>

    @forelse($employees as $emp)
        <div style="border-bottom: 1px solid #eee; padding: 8px; margin-bottom: 5px;">
            <strong>{{ $emp->name }}</strong> - {{ $emp->email }} 
            (Phòng: {{ $emp->department->name ?? 'N/A' }})
        </div>
    @empty
        <p>Danh sách nhân viên trống.</p>
    @endforelse

    <div style="margin-top: 20px;">
        {{ $employees->links() }}
    </div>

@endsection