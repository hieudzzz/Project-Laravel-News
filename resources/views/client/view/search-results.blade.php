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
