@extends('client.layout')
<link rel="stylesheet" href="{{ asset('css/chitiet.css') }}">

@section('tieudetrang', $news->tieuDe)

@section('noidung')
<div class="container">
    <div class="news-detail">
        <h1>{{ $news->tieuDe }}</h1>
        <p><strong><i class="icon fas fa-calendar"></i>Ngày Đăng:</strong> {{ $news->ngayDang->format('d/m/Y') }}</p>
        <p><strong><i class="icon fas fa-eye"></i>Số Lần Xem:</strong> {{ $news->xem }}</p>

        <div class="news-content-container">
            @if($news->image)
                <div class="news-image">
                    <img src="{{ asset('storage/images/' . $news->image) }}" alt="{{ $news->tieuDe }}" >

                </div>
            @endif

            <div class="news-summary">
                <p><strong>Tóm Tắt:</strong></p>
                <p>{{ $news->tomTat }}</p>
            </div>
        </div>

        <div class="news-content">
            {!! $news->noiDung !!}
        </div>
    </div>

   <!-- Phần Bình Luận -->
<div class="comments-section mt-5">
    <h3><i class="icon fas fa-comments"></i> Bình Luận</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (Auth::check())
        <form action="{{ route('comments.store', $news->id) }}" method="POST" class="mb-3">
            @csrf
            <div class="mb-3">
                <textarea class="form-control" name="comment" rows="3" required placeholder="Nhập bình luận của bạn..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary"><i class="icon fas fa-paper-plane"></i> Gửi Bình Luận</button>
        </form>
    @else
        <div class="alert alert-warning">
            Bạn cần <a href="{{ route('login') }}">đăng nhập</a> để có thể gửi bình luận.
        </div>
    @endif

    <div class="comments-list">
        @foreach($news->comments as $comment)
            <div class="comment">
                <p><strong><i class="icon fas fa-user"></i> {{ $comment->user->name }}</strong> <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small></p>
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach
    </div>
</div>

</div>
@endsection
