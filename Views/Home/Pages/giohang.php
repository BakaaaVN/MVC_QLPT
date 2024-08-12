<style>
    .no-item-cart {
        text-align: center;
        height: 500px;
        align-items: center;
        justify-items: center;
    }
    .no-item-cart .title {
        font-weight: bold;
        font-size: 25px;
        margin-top: 20px;
    }
    .no-item-cart .text {
        margin-top: 15px;
    }
    .no-item-cart .btn {
        margin-top: 15px;
    }
    .icon-size-50 {
        font-size: 200px;
    }
    .caculator {
        border: 1px solid #eaeaea;
        border-radius: 5px;
        padding: 20px;
    }
    .pre-calc {
        display: flex;
    }
    .left-side {
        margin-top: 5px;
        flex: 2;
    }
    .right-side {
        margin-top: 5px;
        flex: 1;
        text-align: right;
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
</style>

<div style="width: 90%; margin-left: auto; margin-right: auto; padding: 20px;">
    <?php if(($data['cart'])) : ?>
        <div class="row">
            <div class="col-9">
            <div style="display:flex;">
                <h3 style="font-weight: bold; flex:1">Giỏ hàng (<?php echo count($data['cart']) ?>)</h3>
            </div>
                <table>
                    <tr>
                        <th><input type="checkbox" class="form-check-input" id="select-all"></th>
                        <th style="width: 50%; text-align: center;">Sản phẩm</th>
                        <th style="width: 18%; text-align: center">Đơn giá</th>
                        <th style="width: 18%;text-align: center;">Số lượng</th>
                        <th style="width: 9%;text-align: center;">Thành tiền</th>
                        <th style="width: 9%;text-align: center;"></th>
                    </tr>
                    <?php foreach($data['cart'] as $item) : ?>
                        <tr style="font-weight: bold;">
                            <td><input class="form-check-input" type="checkbox" data-id="<?php echo $item['MaSP'] ?>" id="item" name="item"></td>
                            <td>
                                <img width="50" height="50" src="../Content/Images/<?php echo $item['HinhAnh'] ?>" alt="NO IMAGE">
                                <a style="text-decoration: none;" href="../Chitietsanpham/Details/<?php echo $item['MaSP'] ?>"><?php echo $item['TenSP'] ?></a>
                            </td>
                            <td style="text-align: center">
                                <p hidden id="item-price-<?php echo $item['MaSP'] ?>"><?php echo $item['Gia'] ?></p>
                                <?php echo number_format($item['Gia'], 0, '', '.') . "đ" ?>
                            </td>
                            <td style="text-align: center">
                                <button data-id="<?php echo $item['MaSP'] ?>" class="item-button item-minus" id="item-minus">-</button>
                                <input readonly class="item-quantity" type="number" id="quantity-<?php echo $item['MaSP'] ?>" value="<?php echo $item['SoLuong'] ?>">
                                <button data-id="<?php echo $item['MaSP'] ?>" class="item-button item-add" id="item-add">+</button>
                            </td>
                            <td style="text-align: center">
                                <div id="total-money-product-<?php echo $item['MaSP'] ?>"></div>
                            </td>
                            <td style="text-align:center;">
                                <a href="../Giohang/removeCart/<?php echo $item['MaSP'] ?>" style="color:red"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="col">
                <div class="caculator">
                    <div class="pre-calc">
                        <span class="left-side">Tổng sản phẩm</span>
                        <span class="right-side" style="font-weight: bold;" id="number">-</span>
                    </div>
                    <div class="pre-calc">
                        <span class="left-side">Số lượng sản phẩm</span>
                        <span class="right-side" style="font-weight: bold;" id="quantity">-</span>
                    </div>
                    <hr>
                    <div class="pre-calc">
                        <span class="left-side" style="font-weight: bold; font-size:20px;">Tổng tiền</span>
                        <span class="right-side" id="totalprice" style="font-weight: bold; font-size:25px;color: red">0 đ</span>
                    </div>
                    <button disabled class="btn btn-primary" id="buynow" style="width:100%;font-weight:bold">Mua hàng (<span id="number-product">0</span>)</button>
                </div>
            </div>
        <?php else: ?>
            <div class="no-item-cart">
                <i class="bi bi-cart icon-size-50"></i>
                <div class="title">Chưa có sản phẩm nào</div>
                <div class="text">Hãy khám phá để mua sắm thêm</div>
                <a href="../Home/Index" class="btn btn-primary">Khám phá ngay</a>
            </div>
        <?php endif; ?>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var checkedboxed = document.querySelectorAll('#item')
    var number = document.getElementById('number');
    var quantity = document.getElementById('quantity');
    var totalprice = document.getElementById('totalprice');
    var numberproduct =document.getElementById('number-product')
    var buybutton =document.getElementById('buynow')
    var selectAll = document.getElementById('select-all');
    var quantityInput = document.getElementById('quantity');
    var addButton = document.querySelectorAll('.item-add');
    var minusButton = document.querySelectorAll('.item-minus');

    buybutton.addEventListener('click', function(e) {
        let selectedItems = [];
        checkedboxed.forEach(function(checkbox) {
            var id = checkbox.dataset.id;
            const quantity = parseInt(document.getElementById('quantity-' + id).value);
            if(checkbox.checked) {
                let item = {
                    MaSP: id,
                    SoLuong: quantity,
                };
                selectedItems.push(item)
            }
        })
        $.ajax({
            type: "POST",
            url: "http://localhost/MVC_QLPT/Thanhtoan/createOrderID",
            data: JSON.stringify({
                data: selectedItems,
            }),
            dataType: "JSON",
            success: function (response) {
                if(response.status === 200) {
                    window.location.href = `../Thanhtoan/index/${response.OrderID}`
                }
            }, error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    })

    function caculatePrice() {
        let total = 0;
        let totalproduct = 0;
        let totalquantity = 0;
        let selectedItems = [];
        checkedboxed.forEach(function(checkbox) {
            var id = checkbox.dataset.id;
            calcTotal(id);
            const price = parseInt(document.getElementById('item-price-' + id).innerText);
            const quantity = parseInt(document.getElementById('quantity-' + id).value);
            if(checkbox.checked) {
                total += price * quantity;
                totalproduct += 1;
                totalquantity += quantity;
            } else selectAll.checked = false;
        });

        if(totalproduct != 0) {
            number.innerHTML = totalproduct;
            quantity.innerHTML =totalquantity;
            totalprice.innerHTML = formatToVND(total);
            numberproduct.innerHTML = totalproduct;
            buybutton.disabled = false;
        } else {
            number.innerHTML = "-";
            quantity.innerHTML = "-";
            totalprice.innerHTML = "0 đ";
            numberproduct.innerHTML = 0;
            buybutton.disabled = true;
        }
    }
    checkedboxed.forEach(function(checkbox) {
        checkbox.addEventListener('change', caculatePrice);
    })
    selectAll.addEventListener('change', function(e) {
        checkedboxed.forEach(function(checkbox) {
            checkbox.checked = e.target.checked;
        })
        caculatePrice();
    })
    function formatToVND(number) {
        const formatter = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
            minimumFractionDigits: 0,
        });
        return formatter.format(number);
    }
    
    minusButton.forEach(function(btn) {
        btn.addEventListener('click', function(e) {
        const id = btn.dataset.id;
        if(minusQuantity(id)) {
            var number = document.getElementById('quantity-' + id);
            $.ajax({
                type: "POST",
                url: "http://localhost/MVC_QLPT/Giohang/updateCart",
                data: JSON.stringify({
                    MaSP: id,
                    SoLuong: number.value,
                }),
                dataType: "JSON",
                success: function (response) {
                    if(response.status === 200) {
                        e.preventDefault();
                    }
                }, error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }
        })
    })
    function minusQuantity(masp) {
        var number = document.getElementById('quantity-' + masp);
        let currentQuantity = parseInt(number.value);
        var flag = false;
        if(currentQuantity > 1) {
            number.value = currentQuantity - 1;
            addButton.disabled = false;
            flag = true;
        }
        caculatePrice();
        console.log(masp)
        return flag;
    }

    function addQuantity(masp) {
        var number = document.getElementById('quantity-' + masp);
        let currentQuantity = parseInt(number.value);
        var flag = false;
        if(currentQuantity < 999) {
            number.value = currentQuantity + 1;
            addButton.disabled = false;
            flag = true;
        }
        caculatePrice();
        console.log(masp)
        return flag;
    }
    addButton.forEach(function(btn) {
        btn.addEventListener('click', function(e) {
        const id = btn.dataset.id;
        if(addQuantity(id)) {
            var number = document.getElementById('quantity-' + id);
            $.ajax({
                type: "POST",
                url: "http://localhost/MVC_QLPT/Giohang/updateCart",
                data: JSON.stringify({
                    MaSP: id,
                    SoLuong: number.value,
                }),
                dataType: "JSON",
                success: function (response) {
                    if(response.status === 200) {
                        e.preventDefault();
                    }
                }, error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }
    })
    })
    function calcTotal(masp) {
        var gia = document.getElementById('total-money-product-' + masp);
        const price = parseInt(document.getElementById('item-price-' + masp).innerText);
        const quantity = parseInt(document.getElementById('quantity-' + masp).value);
        gia.innerHTML = formatToVND(price * quantity);
    }

    quantityInput.addEventListener("input", function(event) {
        let newValue = event.target.value.replace(/\D/g, "");

        newValue = newValue.substring(0, 3);

        if (newValue !== this.value) {
            this.value = newValue;
        }
        caculatePrice();
    }); 
    
    caculatePrice();
</script>