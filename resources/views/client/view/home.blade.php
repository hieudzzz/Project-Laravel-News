@extends('client.layout')

@section('tieudetrang', 'Trang Chủ')

@section('noidung')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <!-- Tin Nổi Bật -->
            <section>
                <h2>Tin Nổi Bật</h2>
                <div class="row">
                    @foreach ($tinNoiBat as $tin)
                        <div class="col-md-4 tin-item">
                            @if($tin->image)
                                <div class="tin-image">
                                    <img src="{{ $tin->image }}" alt="{{ $tin->tieuDe }}" class="img-fluid">
                                </div>
                            @endif
                            <h3><a href="{{ route('client.chitiet', $tin->id) }}">{{ $tin->tieuDe }}</a></h3>
                            <p>{{ $tin->tomTat }}</p>
                        </div>
                    @endforeach
                </div>
            </section>

            <!-- Tin Mới Nhất -->
            <section>
                <h2>Tin Mới Nhất</h2>
                <div class="row">
                    @foreach ($tinMoiNhat as $tin)
                        <div class="col-md-4 tin-item">
                            @if($tin->image)
                                <div class="tin-image">
                                    <img src="{{ $tin->image }}" alt="{{ $tin->tieuDe }}" class="img-fluid">
                                </div>
                            @endif
                            <h3><a href="{{ route('client.chitiet', $tin->id) }}">{{ $tin->tieuDe }}</a></h3>
                            <p>{{ $tin->tomTat }}</p>
                        </div>
                    @endforeach
                </div>
            </section>

            <!-- Tin Xem Nhiều -->
            <section>
                <h2>Tin Xem Nhiều</h2>
                <div class="row">
                    @foreach ($tinXemNhieu as $tin)
                        <div class="col-md-4 tin-item">
                            @if($tin->image)
                                <div class="tin-image">
                                    <img src="{{ $tin->image }}" alt="{{ $tin->tieuDe }}" class="img-fluid">
                                </div>
                            @endif
                            <h3><a href="{{ route('client.chitiet', $tin->id) }}">{{ $tin->tieuDe }}</a></h3>
                            <p>{{ $tin->tomTat }}</p>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>

        @include('client.view.newest-news', ['tinMoiNhatThem' => $tinMoiNhatThem])
    </div>
</div>
@endsection
