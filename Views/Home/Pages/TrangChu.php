<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        	<div class="carousel-indicators">
            	<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            	<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            	<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
            	<div class="carousel-item active">
                	<img src="http://localhost/MVC_QLPT/Content/Images/1.webp" class="d-block w-100" alt="...">
            	</div>
            	<div class="carousel-item">
              	 	<img src="http://localhost/MVC_QLPT/Content/Images/2.webp" class="d-block w-100" alt="...">
            	</div>
            	<div class="carousel-item">
              		<img src="http://localhost/MVC_QLPT/Content/Images/3.webp" class="d-block w-100" alt="...">
            	</div>
                <div class="carousel-item">
              		<img src="http://localhost/MVC_QLPT/Content/Images/4.webp" class="d-block w-100" alt="...">
            	</div>
            </div>
          	<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
            	<span class="visually-hidden">Previous</span>
          	</button>
          	<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            	<span class="carousel-control-next-icon" aria-hidden="true"></span>
            	<span class="visually-hidden">Next</span>
          	</button>
        </div>

<div class="promotion-products">
    <div class="container">
        <div class="row">
            <div style="height:10px; background-color:#f7f7f7; margin-top: 5px; margin-bottom: 5px;"></div>
            <div class="col">
                <div style="text-align:justify;">
                    <h4 style="display: inline-block; width: 50%">Thực phẩm chức năng</h4>
                </div>
                <div class="row" id="product-container">
                    <?php foreach($data['danhmucs'] as $item) : ?>
                        <div class="item">
                            <a href="../Home/DanhMuc/<?php echo $item->MaDM ?>" style="text-decoration: none;">
                                <img class="item-img" src="http://localhost/MVC_QLPT/Content/Images/<?php echo $item->HinhAnh ?>">
                                <p class="item-name" style="text-align:center;"><?php echo $item->TenDM ?></p>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>   
            </div>
        </div>
        <div class="row">
            <div style="height:10px; background-color:#f7f7f7; margin-top: 5px; margin-bottom: 5px;"></div>
            <div class="col">
                <div style="text-align:justify;">
                    <h4 style="display: inline-block; width: 50%">Sản phẩm gợi ý</h4>
                    <a style="text-decoration: none;display: inline-block; width: 50%; float: right; text-align:right" href="../Home/Sanpham">Xem tất cả</a>
                </div>
                <div class="row" id="product-container">
                    <?php foreach($data['promotion'] as $item) : ?>
                        <div class="item">
                            <a href="../Chitietsanpham/Details/<?php echo $item->MaSP ?>" style="text-decoration: none;">
                                <img class="item-img" src="http://localhost/MVC_QLPT/Content/Images/<?php echo $item->HinhAnh ?>">
                                <p class="item-name"><?php echo $item->TenSP ?></p>
                                <p class="item-price">Giá: <?php echo number_format($item->Gia, 0, '', ',') . "đ" ?></p>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>   
            </div>
        </div>
        <div class="row">
            <div style="height:10px; background-color:#f7f7f7;"></div>
        </div>
    </div>
</div>

<div style="margin-top: 10px;">
    <h3 align="center">THỂ LỆ CHƯƠNG TRÌNH TẶNG COUPON 40K</h3>
    <div style="padding:5px; margin-left:">
        <h4>Điều kiện sử dụng coupon</h4>
        <ul>
            <p>Coupon UUDAI04: Áp dụng giảm ngay 40.000 VNĐ cho đơn hàng có giá trị từ 329.000 VNĐ.</p>
            <p>Thời gian sử dụng coupon: Từ ngày 13/04/2024 đến 17/04/2024</p>
            <p>Khách hàng vui lòng nhập mã ưu đãi khi mua đơn hàng online trên web Pharmacity.vn hoặc ứng dụng Pharmacity</p>
            <p>Mỗi khách hàng chỉ được dùng 1 coupon, coupon không được hoàn khi huỷ đơn</p>
            <p>Không quy đổi thành tiền mặt.</p>
            <p>Không áp dụng cho các sản phẩm Dược Phẩm, Tã - Sữa, Payoo và thẻ điện thoại và các sản phẩm thuộc công ty Ecogreen, Châu Hưng, Thái Minh Miền Nam, Nam Dược.</p>
            <p>Đơn hàng đã sử dụng coupon sẽ không được tạo ra coupon mới.</p>
            <p>Số lượng có hạn trong ngày, chỉ áp dụng cho một số sản phẩm nhất định</p>
            <p>Để biết chi tiết về chương trình và phản hồi về các thắc mắc nếu có, khách hàng vui lòng liên hệ hotline 18006821 (miễn cước) để được tư vấn.</p>
        </ul>
    </div>
</div>