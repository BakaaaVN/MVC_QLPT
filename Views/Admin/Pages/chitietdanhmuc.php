<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<h2 style="text-align:center;">Chỉnh sửa thông tin danh mục</h2>

<form name="form1" id="form1" action="../../suaDanhmuc/index" method="post" enctype="multipart/form-data" style="text-align:center; width:95%; margin: 0 auto;">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="MaDM" value="<?php echo $data['danhmuc']['MaDM'] ?>" placeholder="Mã danh mục" disabled>
                <label for="MaDM">Mã danh mục</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="TenDM" value="<?php echo $data['danhmuc']['TenDM'] ?>" placeholder="Tên danh mục" required pattern="[A-Za-zÀ-ỹ\s]+">
                <label for="TenDM">Tên danh mục</label>
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
        const madm = $('#MaDM').val();
        const tendm = $('#TenDM').val();

        var formData = new FormData();
        formData.append('id', madm)
        formData.append('name', tendm)
        $.ajax({
            type: "POST",
            url: "http://localhost/MVC_QLPT/suaDanhmuc/index",
            data: JSON.stringify({
                name: tendm,
                id: madm,
            }),
            dataType: "json",
            success: function (response) {
                if(response.status === 200) {
                    alert("Lưu thay đổi thành công!");
                    window.location.href = "../../Danhmuc/index";
                }
            },error: function(xhr, status, error) {
                alert("Lưu thay đổi thất bại!");
                console.log(xhr.responseText)
            }
        });
    })
</script>