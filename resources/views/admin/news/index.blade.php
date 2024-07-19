@extends('admin.admin_layout') <!-- Assuming 'layouts.admin' is your layout -->

@section('content')
    <h1>Danh Sách Tin Tức</h1>
    <a href="{{ route('news.create') }}" class="btn btn-primary">Thêm Tin Tức Mới</a>

    <table class="table">
        <thead>
            <tr>
                <th>Tiêu Đề</th>
                <th>Nội Dung</th>
                <th>Tóm Tắt</th>
                <th>Ngày Đăng</th>
                <th>Hình Ảnh</th>
                <th>Ten loai</th>
                <th>Thao Tác</th>

            </tr>
        </thead>
        <tbody>
            @foreach($news as $item)
                <tr>
                    <td>{{ $item->tieuDe }}</td>
                    <td>{{ $item->noiDung }}</td>
                    <td>{{ $item->tomTat }}</td>
                    <td>{{ $item->ngayDang }}</td>

                    <td>
                        @if($item->image)
                            <img src="{{ $item->image }}" alt="Image" width="100">
                        @endif
                    </td>
                   <td>{{ $item->loaiTins->tenLoai ?? 'N/A' }}</td> <!-- Display the name of the related LoaiTin -->
                    <td>
                        <a href="{{ route('news.show', $item->id) }}" class="btn btn-info">Xem</a>
                        <a href="{{ route('news.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('news.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
