<!-- resources/views/client/view/tintrongloai.blade.php -->

@extends('client.layout')

@section('tieudetrang', 'Tin trong loại - ' . $tenLoai)

@section('noidung')
    <h1>{{ $tenLoai }}</h1>
    <div class="tin-container">
        @foreach ($listtin as $tin)
            <div class="tin-item">
                <h2>
                    <a href="{{ route('client.chitiet', ['id' => $tin->id]) }}">
                        {{ $tin->tieuDe }}
                    </a>
                </h2>
                <div class="tin-image">
                    @if($tin->image)
                        <img src="{{ asset('storage/images/' . $tin->image) }}" alt="{{ $tin->tieuDe }}" class="img-fluid" >

                    @else
                        <p>No image available</p>
                    @endif
                </div>
                <p>{{ $tin->tomTat }}</p>
            </div>
        @endforeach
    </div>


@endsection
