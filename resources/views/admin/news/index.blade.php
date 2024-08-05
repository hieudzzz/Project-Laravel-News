@extends('admin.layouts.master')

@section('content')
    <h1>Danh Sách Tin Tức</h1>
    @if(session('admin_name'))
    <p>Chào mừng, {{ session('admin_name') }}!</p>
@endif
    <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">Thêm Tin Tức Mới</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tiêu Đề</th>
                <th>Nội Dung</th>
                <th>Tóm Tắt</th>
                <th>Ngày Đăng</th>
                <th>Hình Ảnh</th>
                <th>lượt xem</th>
                <th>Loại Tin</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $item)
                <tr>
                    <td>{{ $item->tieuDe }}</td>
                    <td>{{ Str::limit($item->noiDung, 50) }}</td> <!-- Hiển thị nội dung ngắn gọn -->
                    <td>{{ Str::limit($item->tomTat, 50) }}</td> <!-- Hiển thị tóm tắt ngắn gọn -->
                    <td>{{ $item->ngayDang->format('d/m/Y H:i') }}</td> <!-- Định dạng ngày tháng -->
                    <td>
                        @if($item->image)
                            <div class="image-container">
                                <img src="{{ asset('storage/images/' . $item->image) }}" alt="Image" width="100">
                            </div>
                        @else

                            <p>Không có hình ảnh</p>
                        @endif
                    </td>
                    <td>{{ $item->xem}}</td>
                    <td>{{ $item->loaiTins->tenLoai ?? 'N/A' }}</td> <!-- Hiển thị tên loại tin -->
                    <td>
                        <a href="{{ route('news.show', $item->id) }}" class="btn btn-info">Xem</a>
                        <a href="{{ route('news.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('news.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($news->isEmpty())
        <p>Không có tin tức nào để hiển thị.</p>
    @endif
@endsection
