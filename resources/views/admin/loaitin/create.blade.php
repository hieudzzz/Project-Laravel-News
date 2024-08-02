@extends('admin.layouts.master')

@section('content')
    <div class="container mt-4">
        <h1>Tạo loại tin mới</h1>
        <form action="{{ route('loaitin.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="tenLoai" class="form-label">Tên Loại</label>
                <input type="text" id="tenLoai" name="tenLoai" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="ThuTu" class="form-label">Thứ Tự</label>
                <input type="number" id="ThuTu" name="ThuTu" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="AnHien" class="form-label">Ẩn Hiện</label>
                <select id="AnHien" name="AnHien" class="form-control" required>
                    <option value="1">Hiện</option>
                    <option value="0">Ẩn</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection
