<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<h2 style="text-align:center;">Chỉnh sửa thông tin tài khoản</h2>

<form name="form1" id="form1" action="../../suaTaiKhoan/index" method="post" enctype="multipart/form-data" style="text-align:center; width:95%; margin: 0 auto;">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="MaTK" value="<?php echo $data['accounts']['MaTK'] ?>" placeholder="Mã tài khoản" disabled>
                <label for="MaTK">Mã tài khoản</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="TenTK" value="<?php echo $data['accounts']['TenTK'] ?>" placeholder="Tên tài khoản" required>
                <label for="TenTK">Tên tài khoản</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="MatKhau" value="<?php echo $data['accounts']['MatKhau'] ?>" placeholder="Mật khẩu" required>
                <label for="MatKhau">Mật khẩu</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="PhanQuyen" value="<?php echo $data['accounts']['PhanQuyen'] ?>" placeholder="Phân quyền" required pattern="[a-z\s]+">
                <label for="PhanQuyen">Phân quyền</label>
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
        const matk = $('#MaTK').val();
        const tentk = $('#TenTK').val();
        const matkhau = $('#MatKhau').val();
        const phanquyen = $('#PhanQuyen').val();
    
        var formData = new FormData();
        formData.append('id', matk)
        formData.append('name', tentk)
        formData.append('password', matkhau)
        formData.append('role', phanquyen)
        $.ajax({
            type: "POST",
            url: "http://localhost/MVC_QLPT/suaTaiKhoan/index",
            data: JSON.stringify({
                name: tentk,
                password: matkhau,
                role: phanquyen,
                id: matk,
            }),
            dataType: "json",
            success: function (response) {
                if(response.status === 200) {
                    alert("Lưu thay đổi thành công!");
                    window.location.href = "../../Taikhoan/index";
                }
            },error: function(xhr, status, error) {
                console.log(xhr.responseText)
            }
        });
    })
</script>