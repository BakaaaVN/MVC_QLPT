<style>
    .item-frame {
        width: 100%;
    }
    .item-frame * {
        display: inline-block;
    }
    .frame-image {
        width: 10%;
    }
    .frame-name {
        width: 40%;
        overflow-wrap: break-word;
        word-wrap: break-word;
        font-weight: bold;
    }
    .frame-number {
        width: 30%;
        text-align: center;
    }
    .frame-price {
        font-weight: bold;
        text-align: center;
    }
    .frame-info {
        margin-top:15px;
        display: flex;
    }
    .left-side {
        flex: 2;
    }
    .right-side {
        flex: 1;
        text-align: right;
    }
    .frame-seprator {
        height: 10px;
        background-color: #eaeaea;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .giaohangtannoi , .nhantainhathuoc {
        display: flex;
    }
    .giaohangtannoi-left, .nhantainhathuoc-left {
        flex: 2;
    }
    .giaohangtannoi-right, .nhantainhathuoc-right {
        flex: 1;
        text-align: right;
    }
    .payment-frame {
        border: 1px solid #eaeaea;
        border-radius: 10px;
        padding: 20px;
        top: 15vh;
        position: sticky;
    }
    .button {
        border: none;
        padding: 8px;
        width: fit-content;
        border-radius: 20px;
        font-weight: bold;
        font-size: 15px;
    }
    .button:hover {
        background-color: rgb(222, 222, 222);
    }
    .button-active {
        background-color: #e3f7fc;
        color: #1b72c0;
    }
    .hide {
        display: none;
    }
    .button-change {
        background-color:white;
        border: none;
        color: #3c7ee1;;
    }
    .button-change:hover {
        color: #0C5BD1;
    }
</style>

<div class="container">
    <div class="row" style="margin-top: 20px;">
        <div class="col-9">
            <div style="padding: 10px">
                <h3>Thanh toán</h3>
                <?php foreach($data['Payment'] as $item): ?>
                    <div class="item-frame">
                        <img class="frame-image" width="50" height="50" src="../../Content/Images/<?php echo $item['HinhAnh'] ?>" alt="NO">
                        <div class="frame-name"><?php echo $item['TenSP'] ?></div>
                        <div class="frame-number">x<?php echo $item['SoLuong'] ?></div>
                        <p hidden id="price"><?php echo $item['Gia'] * $item['SoLuong'] ?></p>
                        <div class="frame-price"><?php echo number_format($item['Gia'] * $item['SoLuong'], 0, '', '.') . "đ" ?></div>
                    </div>
                    <hr>
                <?php endforeach; ?>
            </div>
            <div class="frame-seprator"></div>
            <div style="padding: 10px;">
                <h5>Hình thức nhận hàng</h5>
                <div style="margin-bottom: 20px;">
                    <button class="button button-active" value="ghtn">Giao hàng tận nơi</button>
                    <button class="button" value="ntnt">Nhận tại nhà thuốc</button>
                </div>
                
                <div class="giaohangtannoi payment-info" data-id="ghtn">
                    <div class="giaohangtannoi-left">
                        <h6>Thông tin người nhận</h6>
                        <?php if(isset($data['User']['DiaChi']) || isset($data['User']['SoDT'])) : ?>
                            <span id="madh" hidden><?php echo $data['OrderID'] ?></span>
                            <span id="makh" hidden><?php echo $data['User']['MaKH']?></span>
                            <span id="tenkh"><?php echo $data['User']['TenKH']?></span> | <span id="sdt"><?php echo $data['User']['SoDT']?></span> <br>
                            <span id="diachi"><?php echo $data['User']['DiaChi']?></span>
                        <?php else : ?>
                        <?php endif; ?>
                    </div>
                    <div class="giaohangtannoi-right">
                        <button class="button-change ghtn" data-bs-toggle="modal" data-bs-target="#exampleModal">Thay đổi</button>
                    </div>
                    <hr>
                </div>
                <div class="nhantainhathuoc payment-info hide" data-id="ntnt">
                    <div class="nhantainhathuoc-left">
                        <h6>Thông tin người nhận</h6>
                        <span><?php echo $data['User']['TenKH']?></span> | <span><?php echo $data['User']['SoDT']?></span> <br>
                    </div>
                    <div class="nhantainhathuoc-right">
                        <button class="button-change ntnt">Thay đổi</button>
                    </div>
                </div>
            </div>
            <div class="frame-seprator"></div>
            <div style="padding: 10px;">
                <h5>Phương thức thanh toán</h5>
                <div class="pttt-cash">
                    <input type="radio" checked="checked" class="form-input-radio" id="pttt" name="pttt" value="Tiền mặt">
                    <label for="pttt-cash">
                        <img width="50" height="50" src="https://prod-cdn.pharmacity.io/e-com/images/payment-methods/20240219101736-0-COD.png" alt="">
                        <span>Tiền mặt</span>
                    </label>
                </div>
                <div class="pttt-momo">
                    <input type="radio" class="form-input-radio" id="pttt" name="pttt" value="Momo">
                    <label for="pttt-momo">
                        <img width="50" height="50" src="https://prod-cdn.pharmacity.io/e-com/images/payment-methods/20240219102059-0-Momo.png" alt="">
                        <span>Momo</span>
                    </label>
                </div>
                <div class="pttt-zalo">
                    <input type="radio" class="form-input-radio" id="pttt" name="pttt" value="Zalo">
                    <label for="pttt-zalo">
                        <img width="50" height="50" src="https://prod-cdn.pharmacity.io/e-com/images/payment-methods/20240219102305-0-Viettelmoney%20%281%29.png" alt="">
                        <span>Zalo</span>
                    </label>
                </div>
                <div class="pttt-bank">
                    <input type="radio" class="form-input-radio" id="pttt" name="pttt" value="Bank">
                    <label for="pttt-bank">
                        <img width="50" height="50" src="https://prod-cdn.pharmacity.io/e-com/images/payment-methods/20240219102148-0-ATM.png" alt="">
                        <span>Chuyển khoản</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="payment-frame">
                <h5>Chi tiết thanh toán</h5>
                <div class="frame-info">
                    <span class="left-side">Tạm tính</span>
                    <span class="right-side" style="font-weight:bold;" id="pre-calc">-</span>
                </div>
                <div class="frame-info">
                    <span class="left-side">Phí vận chuyển</span>
                    <span class="right-side" style="font-weight:bold;">Miễn phí</span>
                </div>
                <hr>
                <div class="frame-info">
                    <span class="left-side">Tổng tiền</span>
                    <span class="right-side" style="color:red; font-weight:bold;font-size:22px;" id="total">-</span>
                </div>
                <div class="frame-info">
                    <button class="btn btn-primary" id="ordernow" style="width: 100%">Đặt hàng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin giao hàng</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="phone">Họ tên</label>
                        <input class="form-control" type="text" placeholder="Họ và tên" id="name" name="name" value="<?php echo $data['User']['TenKH'] ?>">
                        <div class="error error-name"></div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="phone">Số điện thoại</label>
                        <input class="form-control" type="tel" placeholder="Số điện thoại" id="phone" name="phone" value="<?php echo $data['User']['SoDT'] ?>">
                        <div class="error error-phone"></div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="city">Tỉnh/Thành phố</label>
                        <select class="form-select" id="city">
                            <option value="" hidden selected>Chọn tỉnh thành</option>
                        </select>
                        <div class="error error-city"></div>
                    </div>
                            
                    <div class="form-group mb-3">
                        <label for="city">Quận/Huyện</label>
                        <select class="form-select" id="district" disabled>
                            <option value="" hidden selected>Chọn quận huyện</option>
                        </select>
                        <div class="error error-district"></div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="city">Phường xã</label>
                        <select class="form-select" id="ward" disabled>
                            <option value="" hidden selected>Chọn phường xã</option>
                        </select>
                        <div class="error error-ward"></div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="sonha">Địa chỉ cụ thể</label>
                        <input type="text" placeholder="Địa chỉ nhà" class="form-control" id="sonha" name="sonha">
                        <div class="error error-diachi"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-success" id="savechange">Lưu địa chỉ</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
	var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var sonha =document.getElementById('sonha');
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
        method: "GET", 
        responseType: "application/json", 
    };
    var promise = axios(Parameter);
        promise.then(function (result) {
            renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Id);
        }
        citis.onchange = function () {
            district.length = 1;
            ward.length = 1;
            if(this.value != "") {
                const result = data.filter(n => n.Id === this.value);
                districts.disabled = false;
                for (const k of result[0].Districts) {
                    district.options[district.options.length] = new Option(k.Name, k.Id);
                }
            }
        };
        district.onchange = function () {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.value);
            if (this.value != "") {
                ward.disabled = false;
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;
                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Id);
                }
            }
        };
    }
    document.getElementById('savechange').addEventListener('click', function(e) {
        const tp = citis.options[citis.selectedIndex].text
        const quan = districts.options[districts.selectedIndex].text;
        const phuong = ward.options[ward.selectedIndex].text;
        const nha = sonha.value;
        const newDiachi = nha + ", " + phuong + ", " + quan + ", " + tp;
        const newName = document.getElementById('name').value;
        const newSdt = document.getElementById('phone').value;
        var tenkh =document.getElementById('tenkh');
        var sdt =document.getElementById('sdt');
        var diachi =document.getElementById('diachi');
        if(validateData(tp, quan, phuong, nha)) {
            tenkh.innerHTML = newName;
            sdt.innerHTML = newSdt;
            diachi.innerHTML = newDiachi;
        }

    })
    function validateData(citis, districts, ward, sonha) {
        var flag = 0;
        if(citis.value == "") {
            flag = 1
        }
        if(districts.value == "") {
            flag = 1
        }
        if(ward.value == "") {
            flag = 1;
        }
        if(!sonha || sonha.length <= 0) {
            flag = 1;
        }
        if(flag == 0) {
          return true;
        } else return false;
    }
</script>
<script>
    var buttons = document.querySelectorAll('.button');
    var divs =document.querySelectorAll('.payment-info');
    var prices =document.querySelectorAll('#price');
    var price = 0;
    prices.forEach(function(e) {
        const p = parseInt(e.innerHTML);
        price += p;
    })
    document.getElementById('pre-calc').innerHTML = formatToVND(price);
    document.getElementById('total').innerHTML = formatToVND(price);

    var precalc = document.getElementById('pre-calc');
    buttons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            // hide all div before checking
            divs.forEach(function(div) {
                div.classList.add('hide');
                if(button.value === div.dataset.id) {
                    div.classList.remove('hide');
                }
            })
            // add active for button
            buttons.forEach(function(otherButton) {
                otherButton.classList.remove('button-active');
            })

            this.classList.add('button-active');
        })
    })

    function formatToVND(number) {
        const formatter = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
            minimumFractionDigits: 0,
        });
        return formatter.format(number);
    }
    document.getElementById('ordernow').addEventListener('click', function(e) {
        const madh =document.getElementById('madh').innerHTML;
        const makh = document.getElementById('makh').innerHTML;
        const tenkh =document.getElementById('tenkh').innerHTML;
        const sdt =document.getElementById('sdt').innerHTML;
        const diachi =document.getElementById('diachi').innerHTML;
        var radios =document.querySelectorAll('#pttt');
        let date = new Date().toISOString().slice(0, 10);;
        var pttt;
        radios.forEach(function(e) {
            if(e.checked)
                pttt = e.value;
        })
        data = {
            "MaDH":madh,
            "MaKH":makh,
            "NgayDat":date,
            "DuKien":date,
            "PhuongThuc":pttt,
            "TongTien":price,
            "TrangThai":"Đang xử lý",
            "TenKH":tenkh,
            "SoDT":sdt,
            "DiaChi":diachi,
        };
        $.ajax({
            type: "POST",
            url: "http://localhost/MVC_QLPT/HoaDon/createOrder",
            data: JSON.stringify({
                orderinfo: data,
            }),
            dataType: "JSON",
            success: function (response) {
                if(response.status === 200) {
                    alert("Đặt thành công");
                    window.location.href = "../../Home/index"
                }
            }, error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    })
</script>