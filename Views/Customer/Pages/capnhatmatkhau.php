<style>
    .input-group {
        padding: 10px;
    }
    .input-group input {
        width: 100%;
    }
    .error {
        width: 100%;
        margin-top: 0.25rem;
        font-size: 0.875rem;
        color: var(--bs-form-invalid-color);
    }
    .error-newpass, .error-repass, .error-oldpass {
        display: none;
    }
</style>


<div class="account-info">
    <div style="display: flex">
        <h5 style="flex: 1">Cấp lại mật khẩu</h5>
        <a href="../../Account/orderHistory" style="flex: 1;text-align:right">Trở về <i class="bi bi-arrow-90deg-left"></i></a>
    </div>
    <h6>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác <br> Bạn có thể tạo mật khẩu từ 6 - 16 kí tự</h6>
    <div class="row">
        <div class="col-6" style="border-right: 1px solid #eaeaea;">
        <input class="form-control" type="text" hidden id="id" name="id" value="<?php echo $data['User']['MaTK'] ?>">
            <label for="oldpass" style="padding-left: 10px">Mật khẩu cũ</label>
            <div class="input-group">
                <input class="form-control" type="password" id="oldpass" name="oldpass" placeholder="Mật khẩu ban đầu">
                <i class="bi bi-eye-slash" id="togglePassword" data-id="oldpass" style="cursor: pointer;margin-top:6px; margin-left: -30px; z-index: 100;"></i>
                <div class="error error-oldpass"></div>
            </div>
            <label for="newpass" style="padding-left: 10px">Mật khẩu mới</label>
            <div class="input-group">
                <input class="form-control" type="password" id="newpass" name="newpass" placeholder="Mật khẩu mới">
                <i class="bi bi-eye-slash" id="togglePassword" data-id="newpass" style="cursor: pointer;margin-top:6px; margin-left: -30px; z-index: 100;"></i>
                <div class="error error-newpass"></div>
            </div>
            <label for="newpass" style="padding-left: 10px">Mật khẩu cũ</label>
            <div class="input-group">
                <input class="form-control" type="password" id="repass" name="repass" placeholder="Mật khẩu mới">
                <i class="bi bi-eye-slash" id="togglePassword" data-id="repass" style="cursor: pointer;margin-top:6px; margin-left: -30px; z-index: 100;"></i>
                <div class="error error-repass"></div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" id="savechange">Hoàn thành</button>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
const togglePassword = document.querySelectorAll("#togglePassword");
const icons =document.querySelectorAll('#togglePassword');
var oldpass = document.getElementById('oldpass');
var newpass = document.getElementById('newpass');
var repass = document.getElementById('repass');
var errrepass = document.querySelector('.error-repass');
var erroldpass = document.querySelector('.error-oldpass');
var errnewpass = document.querySelector('.error-newpass');
var oldpassInput =document.getElementById('oldpass').value;
var newpassInput =document.getElementById('newpass').value;
var repassInput =document.getElementById('repass').value;
var id =document.getElementById('id').value;
console.log(id)
    togglePassword.forEach(function(button) {
        button.addEventListener("click", function () {
            const id = button.dataset.id;
            var targetInput = document.getElementById(id);
            const type = targetInput.getAttribute("type") === "password" ? "text" : "password";
            targetInput.setAttribute("type", type);
            button.classList.toggle('bi-eye-slash');
            button.classList.toggle('bi-eye');
        });
    })
    document.getElementById('repass').addEventListener('input', function(e) {
        var pass = document.getElementById('newpass').value;
        if(this.value !== pass) {
            errrepass.innerHTML = "Mật khẩu không trùng nhau";
            errrepass.style.display = "block";
        } else errrepass.style.display = "none";
    })
    function validatePass() {
        oldpassInput =document.getElementById('oldpass').value;
        newpassInput =document.getElementById('newpass').value;
        repassInput =document.getElementById('repass').value;
        var flag = 0;
        if(oldpassInput.length <= 0) {
            console.log(oldpassInput)
            erroldpass.innerHTML = "Vui lòng điền thông tin";
            erroldpass.style.display = "block";
            flag = 1
        } else erroldpass.style.display = "none";

        if(!newpassInput) {
            errnewpass.innerHTML = "Vui lòng điền thông tin";
            errnewpass.style.display = "block";
            flag = 1
        } else errnewpass.style.display = "none";

        if(repassInput !== newpassInput) {
            errrepass.innerHTML = "Mật khẩu không trùng nhau";
            errrepass.style.display = "block";
            flag = 1
        } else if(!repassInput) {
            errrepass.innerHTML = "Vui lòng điền thông tin";
            errrepass.style.display = "block";
            flag = 1
        } else errrepass.style.display = "none";

        if(flag == 0)
            return true;
        else return false;
    }
    document.getElementById('savechange').addEventListener('click', function(e) {
        if(validatePass()) {
            $.ajax({
                type: "POST",
                url: "http://localhost/MVC_QLPT/Account/updateAccountPassword",
                data: JSON.stringify({
                    id: id,
                    oldpass: oldpassInput,
                    newpass: newpassInput,
                }),
                dataType: "JSON",
                success: function (response) {
                    if(response.status === 200) {
                        alert("Cập nhật mật khẩu thành công!");
                        window.location.href = "../Account/index";
                    } else if(response.status === 400) {
                        e.preventDefault();
                        erroldpass.innerHTML = "Mật khẩu cũ không đúng";
                        erroldpass.style.display = "block";
                    }
                    console.log(response)
                }, error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }
    })
</script>