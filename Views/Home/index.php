<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://localhost/MVC_QLPT/Content/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="http://localhost/MVC_QLPT/Content/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<title>Cửa hàng thực phẩm chức năng</title>
<style>
    .bg-blue {
        background-color: #0072bc;
    }
    .list-item {
        background-color: white;
        border-radius: 10px;
    }
    .d-flex {
        margin-left: 20px;
    }	
    .search-bar {
        width: 500px;
    }
    .search-button {
        border: 0px;
        background-color: white;
        margin-left: -44px;
    }
    .button-cart {
        background: #338ec9;
        color: white;
        border: 0px;
        border-radius: 10px;
        font-size: 1.3rem;
        height: 60px;
        width: 120px;
    }
    .footer {
        background-color:#e5e5e5;
        border-radius: 10px;
    }
    .footer-content-title {
        font-size: 18px;
        font-weight: bold;
    }
    .footer-content-text {
        color: grey;
        font-size:13px;
    }
    .navbar-bg {
        background-image: url("http://localhost/MVC_QLPT/Content/Images/navbar-bg.png");
    }
    .button-nav {
        width: 15 0px;
        color: white;
        background-color: #0072bc;
        border-radius: 10px;	
    }
    .header-menu {
        height: 60px;
        background-color: #ededed;
        padding-top:18px;
        padding-left: 100px;
        color:#bcc7da;
    }
    .title-menu {
        height: 120px;
        background-color: #f2f6fe;
        color:#112950;
        padding-top:30px;
        padding-left: 100px;
        font-size: 30px;
        font-weight: bold;
    }
    .col-3 {
        border-right: 1px solid lightgrey;
    }
    .col-9 {
        padding-left: 20px;
    }
    .filter-prices {
        margin-left: -10px;
        margin-top: 20px;
    }
    .item {
    width: 20%; 
    border-radius: 10px;
    text-decoration: none;
    display: inline-block; 
    vertical-align: top; 
    border: 2px solid transparent; 
    transition: border-color 0.3s ease;
    overflow: hidden;
    }
    .item:hover {
        border-color: #5dac46;
    }
    .item-img {
        width: 100px;
        height: 100px;
        background-color: #f6fbff;
        margin-left: auto;
        margin-right: auto;
        display: block;
    }
    .item-price {
        color:#0072bc;
        font-weight: bold;
        font-size: 18px;
    }
    .item-name {
        color: #293652;
        font-weight: bold;
        font-size: 15px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
    .sapxep:hover {
        cursor: pointer;
    }
    .filter {

    }
    ul{
        list-style-type:none;
        }
    .pagination {
        text-align: center;
    }
    
    .pagination-menu {
        list-style-type: none;
        padding: 10px 0;
        display: inline-flex;
        justify-content: space-between;
        box-sizing: border-box;
        background-color: #FB503B;
        border-radius: 5px;
    }
    
    .pagination-menu .pagination-item {
        box-sizing: border-box;
    }
    
    .pagination-menu .pagination-item .pagination-link {
        box-sizing: border-box;
        padding: 12px;
        text-decoration: none;
        font-size: 18px;
        color: white;
    
    }
    
    .pagination-menu li a:hover {
        background: rgba(255, 255, 255, 0.2);
        border-top-color: rgba(0, 0, 0, 0.35);
        border-bottom-color: rgba(0, 0, 0, 0.5);
    }
    
    .pagination-menu li:hover {
        background-color: transparent!important;
    }
    .user-exist {
        margin-left: -40px;
        width: 200px;
        color: black;
        text-decoration: none;
    }
    .user-exist a {
        color: black;
    }
    .user-exist .title{
        text-align:center;
    }
    .user-exist .history {
        cursor: pointer;
    }
    .body-content {
        top: 15vh;
        height: auto;
    }
</style>
</head>
<body>
    <div>
    <nav class="navbar navbar-expand-lg navbar-bg sticky-top">
         <div class="container">
            <a class="navbar-brand" href="http://localhost/MVC_QLPT/Home/index"><img src="http://localhost/MVC_QLPT/Content/Images/logo.png" /></a>
             <div class="navbar-collapse collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle list-item" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-grid-fill"></i> Danh mục</a>
                            <ul class="dropdown-menu">
                                <?php foreach($data['danhmuc'] as $item) : ?>
                                    <li>
                                        <a class="dropdown-item" href="http://localhost/MVC_QLPT/Home/DanhMuc/<?php echo $item->MaDM ?>"><?php echo $item->TenDM ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                    </li>
                    <li>
                      <form class="d-flex" role="search" action="Search.php" method="get">
                        <input class="form-control me-2 search-bar" type="search" name="search-input" placeholder="Tìm kiếm thuốc..." aria-label="Search">
                        <button class="search-button" type="submit"><i class="bi bi-search"></i></button>
                      </form>
                    </li>
                 </ul>
             </div>
             <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   <li class="nav-item">
                    <a href="http://localhost/MVC_QLPT/Giohang/index" id="cart-button" class="btn button-cart"><span style="font-size:0.938rem">Giỏ hàng</span> <i class="bi bi-cart"></i></a>
                   
                </li>
                    <li class="nav-item dropdown" style="margin-left: 30px;">
                        <a style="color:white" class="nav-link dropdown-toggle" title="Tài khoản" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle" style="font-size: 2rem; color:white"></i>
                        </a>
                        <?php if(isset($_COOKIE['AuthenticationUser']) && isset($data['User'])) : ?>
                            <div class="dropdown-menu bg-aqua user-exist">
                                <div class="title">Xin chào, <?php echo $data['User']['TenKH'] ?></div>
                                <hr>
                                <a class="history nav nav-link" href="http://localhost/MVC_QLPT/Account/orderHistory">Lịch sử mua hàng</a>
                                <a class="account nav nav-link" href="http://localhost/MVC_QLPT/Account/index">Chỉnh sửa tài khoản</a>
                                <a href="" class="nav nav-link logout" id="logout-user">Đăng xuất</a>
                            </div>
                        <?php elseif(isset($_COOKIE['AuthenticationAdmin'])) : ?>
                            <div class="dropdown-menu bg-aqua user-exist">
                                <div class="title">Xin chào, <?php echo $data['User']['TenKH'] ?></div>
                                <hr>
                                <a class="history nav nav-link" href="http://localhost/MVC_QLPT/Account/index">Lịch sử mua hàng</a>
                                <a class="account nav nav-link" href="http://localhost/MVC_QLPT/Account/index">Chỉnh sửa tài khoản</a>
                                <a class="account nav nav-link" href="http://localhost/MVC_QLPT/TrangChu/index">Trang quản lý</a>
                                <a href="" class="nav nav-link logout" id="logout-admin">Đăng xuất</a>
                            </div>       
                        <?php else : ?>
                            <div class="dropdown-menu bg-white">
                                <a class="nav-link btn-login" href="http://localhost/MVC_QLPT/LoginManager/Login">Đăng nhập</a>
                                <a class="nav-link btn-reg" href="#">Đăng ký</a>
                            </div>
                        <?php endif; ?>
                    </li>
                </ul>
             </div>
        </div>
    </nav>
    </div>
    <div class="body-content">
        <?php require_once './Views/Home/Pages/' . $data['Page'] . ".php" ?>
    </div>
    
    <footer class="text-black py-3 w-100 footer" style="margin:0 auto; margin-top:20px; border-radius: 20px;">
        <div class="container" style="padding:30px">
            <div class="row">
                <div class="col-md-4" style="border-right:1px solid #808080">
                    <h3 class="text-center"><img src="http://localhost/MVC_QLPT/Content/Images/logo.png" /></h3>
                    <p class="text-start">Địa chỉ: 140 Lê Trọng Tấn, Tây Thạnh, Tân Phú, Thành phố Hồ Chí Minh</p>
                    <p class="text-start">Pharmacity nhận đặt hàng trực tuyến và giao hàng tận nơi. KHÔNG hỗ trợ đặt mua và nhận hàng trực tiếp tại văn phòng trên toàn quốc.</p>
                    <p>
                        <i class="bi bi-facebook" style="font-size: 2rem"></i>
                        <i class="bi bi-instagram" style="font-size: 2rem"></i>
                        <i class="bi bi-youtube" style="font-size: 2rem"></i>
                        <i class="bi bi-telegram" style="font-size: 2rem"></i>
                        <i class="bi bi-twitter" style="font-size: 2rem"></i>
                        <i class="bi bi-pinterest" style="font-size: 2rem"></i>
                    </p>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-sms-6 col-smb-12">
                            <div class="footer-content-title">
                                <p>DỊCH VỤ</p>
                            </div>
                            <div class="footer-content-text">
                                <p>Điều khoản và sử dụng</p>
                                <p>Chính sách bảo mật thông tin cá nhân</p>
                                <p>Giới thiệu Pharmacity</p>
                                <p>Hệ thống hiệu thuốc</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-sms-6 col-smb-12">
                            <div class="footer-content-title">
                                <p>HỖ TRỢ</p>
                            </div>
                            <div class="footer-content-text">
                                <p>Chính sách đổi trả - hoàn tiền</p>
                                <p>Chính sách bảo hành - bồi hoàn</p>
                                <p>Chính sách vận chuyển</p>
                                <p>Chính sách thanh toán</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-sms-6 col-smb-12">
                            <div class="footer-content-title">
                                <p>TÀI KHOẢN CỦA TÔI</p>
                            </div>
                            <div class="footer-content-text">
                                <p>Đăng nhập/tạo mới tài khoản</p>
                                <p>Thay đổi địa chỉ khách hàng</p>
                                <p>Chi tiết tài khoản</p>
                                <p>Lịch sử mua hàng</p>
                            </div>
                        </div>
                    </div>
                    <h3 class="footer-content-title">LIÊN HỆ</h3>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="footer-content-text"><i style="font-size:1.2rem" class="bi bi-geo-alt-fill"></i> 140 Lê Trọng Tấn, Q.Tân Phú, TP.HCM</p>
                        </div>
                        <div class="col-md-4">
                            <p class="footer-content-text"><i style="font-size:1.2rem" class="bi bi-envelope-fill"></i> idk123456@gmail.com</p>
                        </div>
                        <div class="col-md-4">
                            <p class="footer-content-text"><i style="font-size:1.2rem" class="bi bi-telephone-fill"></i> 123456789</p>
                        </div>
                    </div>
                </div>
            </div>       
        </div>
    </footer>

<script src="http://localhost/MVC_QLPT/Content/bootstrap/js/bootstrap.js"></script>
<script src="http://localhost/MVC_QLPT/Content/bootstrap/js/bootstrap.min.js"></script>
<script src="http://localhost/MVC_QLPT/Content/bootstrap/js/bootstrap.bundle.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    window.onload = function() {
        document.getElementById('logout-user').addEventListener('click', function(e) {
        $.ajax({
            type: "POST",
            url: "http://localhost/MVC_QLPT/AuthenticationUser/UserLogout",
            success: function (response) {
                console.log(response)
                if(response.status == 200) {
                    window.location.href = "../Home/index";
                }
            }, error: function(xhr, status, error) {
                console.log(xhr.responseText)
            }
        });
    })
    }
</script>
</html>