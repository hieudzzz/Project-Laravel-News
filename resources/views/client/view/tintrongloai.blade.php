<!-- resources/views/client/view/tintrongloai.blade.php -->

@extends('client.layout')

@section('tieudetrang', 'Tin trong loại - ' . $tenLoai)

@section('noidung')
    <h1>{{ $tenLoai }}</h1>
    <ul>
        @foreach ($listtin as $tin)
            <li>
                <h2>
                    <a href="{{ route('client.chitiet', ['id' => $tin->id]) }}">
                        {{ $tin->tieuDe }}
                    </a>
                </h2>
                <p>{{ $tin->tomTat }}</p>
            </li>
        @endforeach
    </ul>
@endsection
