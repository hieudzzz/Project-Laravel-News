@extends('admin.layouts.master')

@section('content')
    <h1>Sửa Tin Tức</h1>

    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
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
            <label for="image">Hình Ảnh:</label>
            <input type="file" name="image" id="image" class="form-control">
            <small>Hiện tại: <img src="{{ asset('storage/images/' . $news->image) }}" alt="Image" width="100"></small>
        </div>

        <div class="form-group">
            <label for="idLT">Loại Tin:</label>
            <select name="idLT" id="idLT" class="form-control" required>
                @foreach($loaitins as $loaitin)
                    <option value="{{ $loaitin->id }}" {{ $loaitin->id == $news->idLT ? 'selected' : '' }}>
                        {{ $loaitin->tenLoai }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
@endsection
