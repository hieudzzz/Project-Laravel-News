<!-- resources/views/client/layout.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>@yield('tieudetrang')</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <style>
/* Banner */
.banner {
    margin-bottom: 20px;
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}
.container-fluid{
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}
.banner img {
    padding: 0 140px;
    width: 100%;
    display: block;
    border-radius: 8px;
}

        .container > footer { height: 90px }
        .container > main { display: flex; min-height: 500px }
        .container {
    padding: 20px;
}

.tin-item {
    margin-bottom: 20px;
}

.tin-item h3 {
    font-size: 1.2rem;
    margin-bottom: 5px;
}

.tin-item p {
    font-size: 1rem;
    color: #666;
}




/* CSS cho phần chi tiết tin tức */
.news-detail {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

.news-detail h1 {
    font-size: 2rem;
    margin-bottom: 15px;
    color: #333;
}

.news-detail p {
    font-size: 1rem;
    color: #666;
    margin-bottom: 10px;
}



.news-detail .news-image img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.news-detail .news-content {
    line-height: 1.6;
    font-size: 1rem;
    color: #333;
}

/* Responsive Design */
@media (max-width: 768px) {
    .news-detail {
        padding: 15px;
    }

    .news-detail h1 {
        font-size: 1.5rem;
    }
}
/* style.css */

.tin-item {
    margin-bottom: 20px;
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.tin-image img {
    width: 100%;
    height: auto;
    max-height: 200px; /* Điều chỉnh theo yêu cầu */
    object-fit: cover; /* Giữ tỷ lệ hình ảnh */
    border-radius: 5px;
}



    /* style.css */


    .container {
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.row {
    display: flex;
    flex-wrap: wrap;
}

.tin-item {
    background: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    margin-bottom: 20px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
}

.tin-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.tin-image {
    width: 100%;
    height: auto; /* Ensure container scales with content */
    display: flex;
    justify-content: center;
    align-items: center;
}

.tin-image img {
    max-width: 70%;
    height: auto;
    display: block;
    object-fit: cover; /* Maintain aspect ratio and cover container */
}

.tin-item h3 {
    font-size: 1.2rem;
    margin: 15px;
    color: #333;
}

.tin-item p {
    margin: 15px;
    color: #666;
    font-size: 1rem;
}

.tin-item a {
    text-decoration: none;
    color: #007bff;
    transition: color 0.3s;
}

.tin-item a:hover {
    color: #0056b3;
}

section {
    margin-bottom: 40px;
}

h2 {
    font-size: 1.5rem;
    margin-bottom: 20px;
    color: #333;
    border-bottom: 2px solid #007bff;
    padding-bottom: 10px;
}
/* navbar */

/* Navbar Styles */
.navbar {
    border-bottom: 1px solid #ddd; /* Border dưới navbar */
}

.navbar-brand {
    font-weight: bold;
    color: #007bff;
}

.navbar-brand:hover {
    color: #0056b3;
}

.nav-link {
    color: #333;
    transition: color 0.3s;
}

.nav-link:hover {
    color: #007bff;
}

.navbar-toggler {
    border-color: #007bff;
}

.navbar-toggler-icon {
    background-image: url('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/images/toggler-icon.svg');
}

.navbar-nav {
    margin-right: auto;
}

.form-control {
    border-radius: 20px; /* Bo tròn góc của thanh tìm kiếm */
}

.btn-outline-success {
    border-radius: 20px; /* Bo tròn góc của nút tìm kiếm */
    margin-left: 10px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .navbar-collapse {
        text-align: center;
    }

    .form-control {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .btn-outline-success {
        width: 100%;
    }
}
/* CSS cho phần bên (aside) */
aside {
    border: 1px solid #ddd; /* Thêm border nếu cần để phân tách */
    border-radius: 8px;
    background-color: #f8f9fa; /* Màu nền sáng để không bị nổi bật quá */
    padding: 15px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

aside h2 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: #333;
}

aside ul {
    padding-left: 0;
}

aside li {
    margin-bottom: 10px;
}

aside a {
    color: #007bff;
    text-decoration: none;
    transition: color 0.3s;
}

aside a:hover {
    color: #0056b3;
}

/* css cho đăng ký dăng nhập */
.d-flex {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    height: 40px; /* Đặt chiều cao logo */
    object-fit: contain; /* Giữ tỷ lệ và không cắt ảnh */
}

.btn {
    margin-left: 10px; /* Khoảng cách giữa các nút */
}

/* Thay đổi màu sắc của nút khi hover */
.btn:hover {
    background-color: #0056b3;
    color: #fff;
}

/* Footer */
footer {
    background-color: #343a40; /* Đổi màu nền footer */
    color: #ffffff; /* Đổi màu chữ footer */
    padding: 20px;
}
    </style>


</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-2">
            <!-- Logo bên trái -->
            <a href="{{ route('client.home') }}">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcdEGD8vi6mU7uzwoDdO-E2XCahs6AGP5fbg&s" alt="Logo" class="logo">
            </a>

            <!-- Các liên kết đăng ký và đăng nhập -->
            <div>
                <a class="btn btn-outline-primary me-2" href="{{ route('register') }}">Đăng Ký</a>
                <a class="btn btn-primary" href="{{ route('login') }}">Đăng Nhập</a>

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
