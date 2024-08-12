<style>
    .form-group {
        padding: 10px;
    }
    .error {
        width: 100%;
        margin-top: 0.25rem;
        font-size: 0.875em;
        color: var(--bs-form-invalid-color);
    }
    .error-name, .error-phone, .error-email {
        display: none;
    }
</style>


<div class="account-info">
    <h5>Thông tin cá nhân</h5>
    <div class="row">
        <div class="col-6" style="border-right: 1px solid #eaeaea;">
        <input class="form-control" type="text" hidden id="id" name="id" value="<?php echo $data['User']['MaKH'] ?>">
            <div class="form-group">
                <label for="name">Họ và tên</label>
                <input class="form-control" type="text" placeholder="Họ và Tên" id="name" name="name" value="<?php echo $data['User']['TenKH'] ?>">
                <div class="error error-name">Hãy nhập họ tên</div>
            </div>
            <div class="form-group">
                <label for="gender">Giới tính</label>
                <select name="gender" id="gender" class="form-select">
                    <option <?php if($data['User']['GioiTinh'] == "Nam") echo "selected" ?> value="Nam">Nam</option>
                    <option <?php if($data['User']['GioiTinh'] == "Nữ") echo "selected" ?> value="Nữ">Nữ</option>
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input class="form-control" type="tel" placeholder="Số điện thoại" id="phone" name="phone" value="<?php echo $data['User']['SoDT'] ?>">
                <div class="error error-phone">Hãy nhập đúng định dạng số điện thoại (0XXXXXXXXX)</div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" placeholder="Email" id="email" name="email" value="<?php echo $data['User']['Email'] ?>">
                <div class="error error-email">Hãy nhập đúng cú pháp của email</div>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <a style="text-decoration:none;" href="../Account/updatePassword">Cập nhật <i class='bi bi-arrow-right'></i></a>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" id="savechange">Lưu thay đổi</button>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var errname = document.querySelector('.error-name');
    var errphone = document.querySelector('.error-phone');
    var erremail = document.querySelector('.error-email');
    document.getElementById('savechange').addEventListener('click', function(e) {
        var id = document.getElementById('id').value;
        var name = document.getElementById('name').value;
        var gender = document.getElementById('gender').value;
        var phone = document.getElementById('phone').value;
        var email = document.getElementById('email').value;
        if(validateAccount(name, phone, email)) {
            $.ajax({
                type: "POST",
                url: "http://localhost/MVC_QLPT/Account/updateAccount",
                data: JSON.stringify({
                    id: id,
                    name: name,
                    gender: gender,
                    phone: phone,
                    email: email,
                }),
                dataType: "JSON",
                success: function (response) {
                    if(response.status === 200) {
                        alert("Cập nhật thông tin thành công!");
                        location.reload();
                    }
                }, error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        } else e.preventDefault();
    })
    function validateAccount(name, phone, email) {
        var flag = 0;
        if (!name || name.trim() === "") {
            errname.style.display = "block";
            flag = 1;
        } else errname.style.display = "none";

        const phoneNumberRegex = /^0\d{9}$/;
        if (!phone || !phoneNumberRegex.test(phone)) {
            errphone.style.display = "block";
            flag = 1;
        } else errphone.style.display = "none";

        const emailRegex = /^[^\s@]+@(?:gmail\.com|email\.com|(?:[a-zA-Z]+)\.edu\.vn)(?:\.[a-zA-Z]{2,})?$/;
        if (!email || !emailRegex.test(email)) {
            erremail.style.display = "block";
            flag = 1;
        } else erremail.style.display = "none";

        if(flag == 0) {
            return true;
        } else return false;
    } 
</script>