<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<h2 style="text-align:center;">Thêm danh mục mới</h2>

<form id="form1" enctype="multipart/form-data" style="text-align:center; width:95%; margin: 0 auto;">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="MaDM" placeholder="Mã danh mục" required autofocus pattern="[A-Z\s\d]+">
                <label for="MaDM">Mã danh mục</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="TenDM"placeholder="Tên danh mục" required pattern="[A-Za-zÀ-ỹ\s]+">
                <label for="TenDM">Tên danh mục</label>
            </div>
        </div>   
    </div>
    <input type="submit" class="btn btn-success" id="btn-add" value="Lưu thay đổi"></input>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    document.querySelector('#form1').addEventListener('submit', function(e) {
        e.preventDefault();
        const madm = $('#MaDM').val();
        const tendm = $('#TenDM').val();
        $.ajax({
            type: "POST",
            url: "http://localhost/MVC_QLPT/themDanhMuc/index",
            data: JSON.stringify({
                id: madm,
                name: tendm,
            }),
            dataType: "JSON",
            success: function (response) {
                if(response.status === 200) {
                    alert("Thêm danh mục thành công!");
                    window.location.href = "../DanhMuc/index";
                }
            }, error: function(xhr, status, error) {
                alert("Thêm thất bại!");
                console.log(xhr.responseText);
            }
        });
    })
</script>