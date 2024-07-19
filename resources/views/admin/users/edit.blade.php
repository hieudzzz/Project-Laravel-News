@extends('admin.admin_layout')

@section('content')
<div class="container mt-4">
    <h1>Sửa Người Dùng</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
       
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật Khẩu</label>
            <input type="password" id="password" name="password" class="form-control">
            <small class="form-text text-muted">Nếu bạn muốn thay đổi mật khẩu, nhập mật khẩu mới.</small>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Xác Nhận Mật Khẩu</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
    </form>
</div>
@endsection
