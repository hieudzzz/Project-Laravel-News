@extends('admin.layouts.master')

@section('content')
<div class="container mt-4">
    <h1>Chi Tiết Người Dùng</h1>
    <div class="mb-3">
        <strong>Tên:</strong>
        <p>{{ $user->name }}</p>
    </div>
    <div class="mb-3">
        <strong>Email:</strong>
        <p>{{ $user->email }}</p>
    </div>
    <div class="mb-3">
        <strong>password:</strong>
        <p>{{ $user->password }}</p>
    </div>
    <div class="mb-3">
        <strong>Ngày Tạo:</strong>
        <p>{{ $user->created_at }}</p>
    </div>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
</div>
@endsection
