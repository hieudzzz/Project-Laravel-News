@extends('admin.layouts.master')

@section('content')
    <h1>Thêm Tin Tức Mới</h1>

    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="tieuDe">Tiêu Đề:</label>
            <input type="text" name="tieuDe" id="tieuDe" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="noiDung">Nội Dung:</label>
            <textarea name="noiDung" id="noiDung" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="tomTat">Tóm Tắt:</label>
            <textarea name="tomTat" id="tomTat" class="form-control"></textarea>
        </div>


        <div class="form-group">
            <label for="image">Hình Ảnh:</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="idLT">Loại Tin:</label>
            <select name="idLT" id="idLT" class="form-control" required>
                <option value="">Chọn loại tin</option>
                @foreach($loaitins as $loaitin)
                    <option value="{{ $loaitin->id }}">{{ $loaitin->tenLoai }}</option> <!-- Đảm bảo 'name' đúng -->
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection
