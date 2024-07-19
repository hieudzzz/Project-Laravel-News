@extends('admin.admin_layout')

@section('content')
    <h1>Chi Tiết Tin Tức</h1>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $news->tieuDe }}</h3>
            <p class="card-text">{{ $news->noiDung }}</p>
            <p><strong>Tóm Tắt:</strong> {{ $news->tomTat }}</p>
            <p><strong>Ngày Đăng:</strong> {{ $news->ngayDang }}</p>
            @if($news->image)
                <img src="{{ $news->image }}" alt="Image" width="200">
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('news.edit', $news->id) }}" class="btn btn-warning">Sửa</a>
            <form action="{{ route('news.destroy', $news->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Xóa</button>
            </form>
            <a href="{{ route('news.index') }}" class="btn btn-secondary">Trở Về</a>
        </div>
    </div>
@endsection
