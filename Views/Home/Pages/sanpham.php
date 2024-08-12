<div class="container">
    <div class="row">
        <div style="color:lightgrey;height:25px; background-color:#f7f7f7; margin-top: 5px; margin-bottom: 5px;">
            <a href="../Home/index" style="text-decoration: none;">Trang chủ</a> <span>&#x2022;</span>
            <a>Toàn bộ sản phẩm</a>
        </div>
        <div class="col">
            <div style="text-align:justify;">
                <h4 style="display: inline-block; width: 50%">Thực phẩm chức năng</h4>
            </div>
            <div class="row" id="product-container">
                <?php foreach($data['danhmucs'] as $item) : ?>
                    <div class="item">
                        <a href="../Home/Danhmuc/<?php echo $item->MaDM ?>" style="text-decoration: none;">
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
                <h4 style="display: inline-block; width: 50%">Toàn bộ sản phẩm</h4>
            </div>
            <div class="row" id="product-container">
                    <?php foreach($data['sanpham'] as $item) : ?>
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
</div>