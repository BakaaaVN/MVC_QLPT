<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<h2 style="text-align:center;">Chỉnh sửa thông tin khách hàng</h2>

<form name="form1" id="form1" action="../../suaKhachhang/index" method="post" enctype="multipart/form-data" style="text-align:center; width:95%; margin: 0 auto;">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="MaKH" value="<?php echo $data['khachhang']['MaKH'] ?>" placeholder="Mã khách hàng" disabled>
                <label for="MaKH">Mã khách hàng</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="TenKH" value="<?php echo $data['khachhang']['TenKH'] ?>" placeholder="Tên khách hàng" required pattern="[A-Za-zÀ-ỹ\s]+">
                <label for="TenKH">Tên khách hàng</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="GioiTinh" value="<?php echo $data['khachhang']['GioiTinh'] ?>" placeholder="Giới tính" required pattern="[A-Za-zÀ-ỹ\s]+"> 
                <label for="GioiTinh">Giới Tính</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="NgaySinh" value="<?php echo $data['khachhang']['NgaySinh'] ?>" placeholder="Ngày sinh" required>
                <label for="NgaySinh">Ngày Sinh</label>
            </div>
            <div class="form-floating mb-3">
                <input type="tel" class="form-control" id="SoDT" value="<?php echo $data['khachhang']['SoDT'] ?>" placeholder="Số điện thoại" required pattern="[0-9]{10}">
                <label for="SoDT">Số điện thoại</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="DiaChi" value="<?php echo $data['khachhang']['DiaChi'] ?>" placeholder="Địa chỉ" required>
                <label for="DiaChi">Địa Chỉ</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="Email" value="<?php echo $data['khachhang']['Email'] ?>" placeholder="Email" required>
                <label for="Email">Email</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="MaTK">
                    <?php foreach($data['account'] as $item) : ?>
                        <option <?php if($item->MaTK == $data['khachhang']['MaTK']) echo "selected" ?> value="<?php echo $item->MaTK ?>"><?php echo $item->TenTK ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="MaTK">Mã tài khoản</label>
            </div>
        </div>  
    </div>
    <input type="submit" class="btn btn-success" id="submit" value="Lưu thay đổi"></input>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    
    document.querySelector('#form1').addEventListener('submit', function(e) {
        e.preventDefault();
        const makh = $('#MaKH').val();
        const tenkh = $('#TenKH').val();
        const gioitinh = $('#GioiTinh').val();
        const ngaysinh = $('#NgaySinh').val();
        const sdt = $('#SoDT').val();
        const diachi = $('#DiaChi').val();
        const Email = $('#Email').val();
        const taikhoan = $('#MaTK').val();

        var formData = new FormData();
        formData.append('id', makh)
        formData.append('name', tenkh)
        formData.append('sex', gioitinh)
        formData.append('birthday', ngaysinh)
        formData.append('phone', sdt)
        formData.append('address', diachi)
        formData.append('email', Email)
        formData.append('accountId', taikhoan)

        $.ajax({
            type: "POST",
            url: "http://localhost/MVC_QLPT/suaKhachhang/index",
            data: JSON.stringify({
                name: tenkh,
                sex: gioitinh,
                birthday: ngaysinh,
                phone: sdt,
                address: diachi,
                email: Email,
                accountId: taikhoan,
                id: makh,
            }),
            dataType: "json",
            success: function (response) {
                if(response.status === 200) {
                    alert("Lưu thay đổi thành công!");
                    window.location.href = "../../Khachhang/index";
                }
            },error: function(xhr, status, error) {
                console.log(xhr.responseText)
            }
        });
    });
    function showError(fieldId) {
        document.getElementById('error-message').style.display = 'block';
        setTimeout(function() {
            document.getElementById('error-message').style.display = 'none';
        }, 3000); // Ẩn thông báo sau 3 giây
        document.getElementById(fieldId).focus();
    }
</script>