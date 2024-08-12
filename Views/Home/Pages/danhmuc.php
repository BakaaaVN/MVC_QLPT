<style>
    .filter-title {
        text-align: justify;
    }
    .filter-text {
        display: inline-block;
        
        text-decoration: none;
    }
    .filter-text .left {
        float: left;
    }
    .filter-text .right {
        float: right;
    }
</style>


<div class="container">
    <div class="row">
        <div style="color:lightgrey;height:25px; background-color:#f7f7f7;margin-top:5px; margin-bottom: 5px;">
            <a href="http://localhost/MVC_QLPT/Home/index" style="text-decoration: none;">Trang chủ</a> <span>&#x2022;</span>
            <a><?php echo $data['name']['TenDM'] ?></a>
        </div>
        <div style="text-align:justify;">
                <h4 style="display: inline-block; width: 50%"><?php echo $data['name']['TenDM'] ?></h4>
        </div>
        <div class="col-2">
            <div class="filter-title">
                <p class="filter-text left">Bộ lọc</p>
                <a href="#" class="filter-text right">Thiết lập lại</a>
            </div>
            <hr style="margin-top: 0px;">
            <div class="filter-input">
                <input type="number" class="form-control" placeholder="Tối thiếu">
                <input type="number" class="form-control" placeholder="Tối đa">

                <input type="button" value="Áp dụng" id="filter-button"> <br>

                <input type="radio" id="1" name="a">
                <label for="1">Dưới 100.000đ</label> <br>
                <input type="radio" id="2" name="a">
                <label for="2">100.000đ - 200.000đ</label> <br>
                <input type="radio" id="3" name="a">
                <label for="3">200.000đ - 500.000đ</label> <br>
                <input type="radio" id="4" name="a">
                <label for="4">Trên 500.000đ</label>
            </div>
        </div>
        <div class="col">
            <div class="row" id="product-container">
                <?php foreach($data['sanpham'] as $item) : ?>
                    <div class="item">
                        <a href="../../Chitietsanpham/Details/<?php echo $item->MaSP ?>" style="text-decoration: none;">
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