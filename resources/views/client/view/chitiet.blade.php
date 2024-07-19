@extends('client.layout')

@section('tieudetrang', $news->tieuDe)

@section('noidung')
<div class="container">
    <div class="news-detail">
        <h1>{{ $news->tieuDe }}</h1>
        <p><strong>Ngày Đăng:</strong> {{ $news->ngayDang->format('d/m/Y') }}</p>
        <p><strong>Số Lần Xem:</strong> {{ $news->xem }}</p>

        @if($news->image)
            <div class="news-image">
                <img src="{{ $news->image }}" alt="{{ $news->tieuDe }}">
            </div>
        @endif

        <p><strong>Tóm Tắt:</strong></p>
        <p>{{ $news->tomTat }}</p>

        <div class="news-content">
            {!! $news->noiDung !!}
        </div>
    </div>
</div>
@endsection
