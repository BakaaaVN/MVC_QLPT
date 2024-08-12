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
    .icon-size-10 {
        font-size: 15px;
        color: grey;
    }
    .item-button {
        border-radius: 50%;
        border: none;
        width: 30px;
        font-size: 18px;
        font-weight: bold;
    }
    .item-quantity {
        border: none;
        width: 35px;
        font-weight: bold;
        text-align: center;
    }
    .item-quantity:focus {
        outline: none;
    }
        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0;
    }
    #buynow, #addcart {
        width: 100%;
        margin-top: 5px;
    }
    .item-border {
        border: 1px solid #eaeaea;
        border-radius: 10px;
        padding: 20px
    }
</style>


<div class="container">
    <div class="row">
        <div style="color:lightgrey;height:25px; background-color:#f7f7f7;margin-top:5px; margin-bottom: 5px;">
            <a href="http://localhost/MVC_QLPT/Home/index" style="text-decoration: none;">Trang chủ</a> <span>&#x2022;</span>
            <a href="http://localhost/MVC_QLPT/Home/DanhMuc/<?php echo $data['name']['MaDM'] ?>" style="text-decoration: none;"><?php echo $data['name']['TenDM'] ?></a>
        </div>
        <div class="col-9">
            <div class="row">
                <div class="col-6" style="text-align:center">
                    <img style="" height="300" width="300" src="../../Content/Images/<?php echo $data['sanpham']['HinhAnh'] ?>" alt="NOOOOOOOOO">
                    <div style="background-color:#e3f7fc;color:#349fda;font-size: 14.4px;font-weight:bold;">Sản phẩm 100% chính hãng, mẫu mã có thể thay đổi theo lô hàng</div>
                </div>
                <div class="col">
                    <div style="font-weight: bold; font-size:20px;"><?php echo $data['sanpham']['TenSP'] ?></div>
                    <div style="font-size:15px; color: grey;"><?php echo $data['sanpham']['MaSP'] ?></div>
                    <div style="color:#0072bc; font-weight: bold; font-size:30px;"><?php echo number_format($data['sanpham']['Gia'], 0, '', '.') ?> đ</div>
                    <div style="color:grey; font-size:15px;">Giá đã bao gồm thuế. Phí vận chuyển và các chi phí khác (nếu có) sẽ được thể hiện khi đặt hàng.</div>
                    <div style="font-size:15px;"><i class="bi bi-heart-fill icon-size-10"></i> Đã bán 1k</div>

                    <hr>
                    
                    <div class="information-group">
                        <span class="information-name">Danh mục</span>
                        <span class="information-info"><?php echo $data['name']['TenDM'] ?></span>
                    </div>
                    <div class="information-group">
                        <span class="information-name">Công dụng</span>
                        <span class="information-info"></span>
                    </div>
                    <div class="information-group">
                        <span class="information-name">Quy cách</span>
                        <span class="information-info"></span>
                    </div>
                    <div class="information-group">
                        <span class="information-name">Lưu ý</span>
                        <span class="information-info">
Sản phẩm này không phải là thuốc, không có tác dụng thay thế thuốc chữa bệnh. Đọc kỹ tờ hướng dẫn sử dụng trước khi dùng.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="item-border">
                <?php if($data['sanpham']['TonKho'] <= 0) : ?>
                    <div class="item-notavailable">
                        <h6>Sản phẩm đã hết hàng</h6>
                        <div>Hiện tại đã hết mặt hàng này, hãy xem xét thay thế sử dụng các sản phẩm khác. Xin cảm ơn.</div>
                    </div>
                <?php else : ?>
                    <div class="item-number">
                        <h6>Số lượng</h6>
                        <div id="product-quantity">
                            <input type="text" id="item-id" hidden value="<?php echo $data['sanpham']['MaSP'] ?>">
                            <button onClick="minusQuantity()" class="item-button item-minus">-</button>
                            <input class="item-quantity" type="number" id="quantity" value="1">
                            <button onClick="addQuantity()" class="item-button item-add">+</button>
                            <hr>
                        </div>
                    </div>
                    <button class="btn btn-primary" id="buynow">Mua ngay</button>
                    <button class="btn btn-outline-primary" id="addcart">Thêm vào giỏ hàng</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var productID = document.getElementById('item-id').value;
    var quantityInput = document.getElementById('quantity');
    var addButton = document.querySelector('.item-add');
    var minusButton = document.querySelector('.item-minus');

    function minusQuantity() {
        var number = document.getElementById('quantity');
        let currentQuantity = parseInt(number.value);
        if(currentQuantity > 1) {
            number.value =currentQuantity - 1;
            addButton.disabled = false;
        }
    }
    function addQuantity() {
        var number = document.getElementById('quantity');
        let currentQuantity = parseInt(number.value);
        if(currentQuantity < 999) {
            number.value = currentQuantity + 1;
            minusButton.disabled = false;
        }
    }
    quantityInput.addEventListener("input", function(event) {
        let newValue = event.target.value.replace(/\D/g, "");

        newValue = newValue.substring(0, 3);

        if (newValue !== this.value) {
            this.value = newValue;
        }
    });
    document.getElementById('addcart').addEventListener('click', function(e) {
        $.ajax({
            type: "POST",
            url: "http://localhost/MVC_QLPT/GioHang/addCart",
            data: JSON.stringify({
                MaSP: productID,
                SoLuong: quantityInput.value,
            }),
            dataType: "JSON",
            success: function (response) {
                if(response.status === 200) {
                    alert("Thêm vào giỏ hàng thành công!");
                    window.location.href = "../../Home/Index"; 
                }
            }, error: function (xhr, status, error) {
                window.location.href = "http://localhost/MVC_QLPT/LoginManager/Login"
            }
        });
    })
</script>