<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['Title'] ?></title>
    <link rel="stylesheet" href="home.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="http://localhost/MVC_qlpt/Content/css/home.css">
    </head>

    <body>
        <div class="sidebar">
            <div class="logo-details">
                <i class='bx bxs-capsule'></i>
                <span class="logo_name">Pharmacity</span>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="http://localhost/MVC_qlpt/TrangChu/index">
                        <i class='bx bx-grid-alt'></i>
                        <span class="links_name">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/MVC_qlpt/SanPham/index">
                        <i class='bx bx-box'></i>
                        <span class="links_name">Sản phẩm</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/MVC_qlpt/DanhMuc/index">
                        <i class='bx bx-list-ul'></i>
                        <span class="links_name">Danh mục</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/MVC_qlpt/DonHang/index">
                        <i class='bx bx-pie-chart-alt-2'></i>
                        <span class="links_name">Đơn hàng</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/MVC_qlpt/KhachHang/index">
                        <i class='bx bx-heart'></i>
                        <span class="links_name">Khách hàng</span>
                    </a>
                </li>
                <li>
                    <a href="http://localhost/MVC_qlpt/TaiKhoan/index">
                        <i class='bx bx-cuboid'></i>
                        <span class="links_name">Tài khoản</span>
                    </a>
                </li>
                <li class="log_out">
                    <a id="logoutButton">
                        <i class='bx bx-log-out'></i>
                        <span class="links_name">Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </div>

        <section class="home-section">
            <nav>
                <div class="sidebar-button">
                    <i class='bx bx-menu sidebarBtn'></i>
                    <span class="dashboard"><?php echo $data['Title'] ?></span>
                </div>
                <div class="profile-details">
                    <img src="https://t4.ftcdn.net/jpg/00/97/00/09/360_F_97000908_wwH2goIihwrMoeV9QF3BW6HtpsVFaNVM.jpg"
                        alt="profile">
                    <span class="admin_name"> <?php echo $data['User']  ?> </span>
                    <i class='bx bx-chevron-down'></i>
                </div>
            </nav>
            <div class="home-content" style="width: 99%; margin: 0 auto;">
                <?php require_once './Views/Admin/Pages/' . $data['Page'] . ".php" ?>
            </div>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
            sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else
            sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
    let navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            navLinks.forEach(item => item.classList.remove('active'));
            this.classList.add('active');
        });
    });
    document.getElementById('logoutButton').addEventListener('click', function(e) {
        $.ajax({
            type: "POST",
            url: "http://localhost/MVC_QLPT/AuthenticationAdmin/AdminLogout",
            success: function (response) {
                console.log(response)
                if(response.status == 200) {
                    window.location.href = "http://localhost/MVC_QLPT/LoginManager/index";
                }
            }, error: function(xhr, status, error) {
                console.log(xhr.responseText)
            }
        });
    })
</script>
</body>
</html>