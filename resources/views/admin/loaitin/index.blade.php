@extends('admin.admin_layout')

@section('content')
    <div class="container mt-4">
        <h1>Danh sách loại tin</h1>
        <a href="{{ route('loaitin.create') }}" class="btn btn-primary mb-3">Tạo loại tin mới</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Loại</th>
                    <th>Thứ Tự</th>
                    <th>Ẩn Hiện</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loaiTins as $loaiTin)
                    <tr>
                        <td>{{ $loaiTin->id }}</td>
                        <td>{{ $loaiTin->tenLoai }}</td>
                        <td>{{ $loaiTin->ThuTu }}</td>
                        <td>{{ $loaiTin->AnHien ? 'Hiện' : 'Ẩn' }}</td>
                        <td>
                            <a href="{{ route('loaitin.show', $loaiTin->id) }}" class="btn btn-info btn-sm">Xem</a>
                            <a href="{{ route('loaitin.edit', $loaiTin->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('loaitin.destroy', $loaiTin->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
