@extends('client.layout')

@section('tieudetrang', 'Trang Chủ')

@section('noidung')
<div class="container">
    <!-- Tìm kiếm theo thời gian thực -->
    <div class="mb-3">
        <input id="search" class="form-control" type="search" placeholder="Tìm kiếm tin tức" aria-label="Search">
    </div>

    <!-- Kết quả tìm kiếm -->


    <div class="row">
        <div class="col-md-12">
            <!-- Tin Nổi Bật -->
            <section>
                <div id="search-results" class="row mb-4">
                    <!-- Kết quả tìm kiếm sẽ được chèn vào đây -->
                </div>
                <h2>Tin Nổi Bật</h2>
                <div class="row">
                    @foreach ($tinNoiBat as $tin)
                        <div class="col-md-4 tin-item">
                            @if($tin->image)
                                <div class="tin-image">
                                    <img src="{{ asset('storage/images/' . $tin->image) }}" alt="{{ $tin->tieuDe }}" class="img-fluid">

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
                                    <img src="{{ asset('storage/images/' . $tin->image) }}" alt="{{ $tin->tieuDe }}" class="img-fluid">
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
                                    <img src="{{ asset('storage/images/' . $tin->image) }}" alt="{{ $tin->tieuDe }}" class="img-fluid">
                                </div>
                            @endif
                            <h3><a href="{{ route('client.chitiet', $tin->id) }}">{{ $tin->tieuDe }}</a></h3>
                            <p>{{ $tin->tomTat }}</p>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>


    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search').on('input', function() {
            let query = $(this).val();
            if (query.length > 2) { // Tìm kiếm khi có ít nhất 3 ký tự
                $.ajax({
                    url: "{{ route('search') }}",
                    method: "GET",
                    data: { query: query },
                    success: function(data) {
                        $('#search-results').html(data);
                    }
                });
            } else {
                $('#search-results').html('');
            }
        });
    });
</script>
@endsection
