<!-- resources/views/client/menu.blade.php -->

@php
    $loaitin = DB::table('loaitins')
        ->where('AnHien', 1)
        ->orderBy('thuTu', 'asc')
        ->get();
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('client.home') }}" >Trang Chủ</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        @foreach ($loaitin as $loai)
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/tintrongloai/' . $loai->id) }}">{{ $loai->tenLoai }}</a>
            </li>
        @endforeach
        
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
      </form>
    </div>
  </div>
</nav>
