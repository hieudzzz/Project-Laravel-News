@extends('admin.admin_layout')

@section('content')
    <h1>Sửa Tin Tức</h1>

    <form action="{{ route('news.update', $news->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tieuDe">Tiêu Đề:</label>
            <input type="text" name="tieuDe" id="tieuDe" class="form-control" value="{{ $news->tieuDe }}" required>
        </div>

        <div class="form-group">
            <label for="noiDung">Nội Dung:</label>
            <textarea name="noiDung" id="noiDung" class="form-control" required>{{ $news->noiDung }}</textarea>
        </div>

        <div class="form-group">
            <label for="tomTat">Tóm Tắt:</label>
            <textarea name="tomTat" id="tomTat" class="form-control">{{ $news->tomTat }}</textarea>
        </div>

        <div class="form-group">
            <label for="ngayDang">Ngày Đăng:</label>
            <input type="datetime-local" name="ngayDang" id="ngayDang" class="form-control" value="{{ $news->ngayDang->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="form-group">
            <label for="xem">Số Lượng Xem:</label>
            <input type="number" name="xem" id="xem" class="form-control" value="{{ $news->xem }}" required>
        </div>

        <div class="form-group">
            <label for="image">Hình Ảnh:</label>
            <input type="url" name="image" id="image" class="form-control" value="{{ $news->image }}">
        </div>

        <div class="form-group">
            <label for="idLT">Loại Tin:</label>
            <select name="idLT" id="idLT" class="form-control" required>
                @foreach($loaitins as $loaitin) <!-- Changed $loaitins to $loaitin -->
                    <option value="{{ $loaitin->id }}" {{ $loaitin->id == $news->idLT ? 'selected' : '' }}>
                        {{ $loaitin->tenLoai }}
                    </option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
@endsection
