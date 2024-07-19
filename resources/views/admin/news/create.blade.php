@extends('admin.admin_layout')

@section('content')
    <h1>Thêm Tin Tức Mới</h1>

    <form action="{{ route('news.store') }}" method="POST">
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
            <label for="ngayDang">Ngày Đăng:</label>
            <input type="datetime-local" name="ngayDang" id="ngayDang" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="xem">Số Lượng Xem:</label>
            <input type="number" name="xem" id="xem" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">Hình Ảnh:</label>
            <input type="url" name="image" id="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="idLT">Loại Tin:</label>
            <select name="idLT" id="idLT" class="form-control" required>
                @foreach($loaitins as $loaitin)
                    <option value="{{ $loaitin->id }}">{{ $loaitin->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection
