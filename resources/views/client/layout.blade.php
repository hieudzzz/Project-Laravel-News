<!-- resources/views/client/layout.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>@yield('tieudetrang')</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />


<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-2">
            <!-- Logo bên trái -->
            <a href="{{ route('client.home') }}">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcdEGD8vi6mU7uzwoDdO-E2XCahs6AGP5fbg&s" alt="Logo" class="logo">
            </a>

            <!-- Các liên kết đăng ký và đăng nhập -->
            <div class="ms-3" style="text-align:right">
                @guest
                    <a class="btn btn-outline-primary me-2" href="{{ route('register') }}">Đăng Ký</a>
                    <a class="btn btn-primary" href="{{ route('login') }}">Đăng Nhập</a>
                @else
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Đăng Xuất</button>
                    </form>
                @endguest
            </div>

        </div>

        </div>
        <div class="banner">
            <img src="https://pbs.twimg.com/media/E-cFQNhXMAMkd_k.jpg:large" alt="Banner Image">
        </div>
        <header class="bg-primary"></header>
        <nav class="bg-warning">@include('client.view.menu', ['loaitin' => $loaitin ?? []])</nav>
        <main>
            <article class="col-12 bg-light" style="margin-top: 20px">
                @yield('noidung')
            </article>

        </main>
        <footer class="bg-dark">PHÁT TRIỂN BỞI XYZ</footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
