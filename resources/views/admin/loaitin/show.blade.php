@extends('admin.layouts.master')

@section('content')
    <div class="container mt-4">
        <h1>Chi tiết loại tin</h1>
        <div class="mb-3">
            <strong>ID:</strong>
            <p>{{ $loaiTin->id }}</p>
        </div>
        <div class="mb-3">
            <strong>Tên Loại:</strong>
            <p>{{ $loaiTin->tenLoai }}</p>
        </div>
        <div class="mb-3">
            <strong>Thứ Tự:</strong>
            <p>{{ $loaiTin->ThuTu }}</p>
        </div>
        <div class="mb-3">
            <strong>Ẩn Hiện:</strong>
            <p>{{ $loaiTin->AnHien ? 'Hiện' : 'Ẩn' }}</p>
        </div>
        <a href="{{ route('loaitin.index') }}" class="btn btn-secondary">Trở về danh sách</a>
    </div>
@endsection
