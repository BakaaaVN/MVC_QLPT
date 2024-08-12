<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<h2 style="text-align:center;">Chỉnh sửa thông tin sản phẩm</h2>

<form name="form1" id="form1" action="../../suaSanpham/index" method="post" enctype="multipart/form-data" style="text-align:center; width:95%; margin: 0 auto;">
    <div class="row">
        <div class="col-5">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="MaSP" value="<?php echo $data['sanpham']['MaSP'] ?>" placeholder="Mã sản phẩm" disabled>
                <label for="MaSP">Mã sản phẩm</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="TenSP" value="<?php echo $data['sanpham']['TenSP'] ?>" placeholder="Tên sản phẩm" required pattern="[A-Za-zÀ-ỹ\s]+">
                <label for="TenSP">Tên sản phẩm</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="MoTa" value="<?php echo $data['sanpham']['MoTa'] ?>" placeholder="Mô tả sản phẩm" required >
                <label for="MoTa">Mô tả sản phẩm</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="Gia" value="<?php echo $data['sanpham']['Gia'] ?>" placeholder="Giá sản phẩm" required pattern="\d+">
                <label for="Gia">Giá</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="TonKho" value="<?php echo $data['sanpham']['TonKho'] ?>" placeholder="Sản phẩm trong kho" required pattern="\d+">
                <label for="TonKho">Tồn kho</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="MaDM">
                    <?php foreach($data['danhmuc'] as $item) : ?>
                        <option <?php if($item->MaDM == $data['sanpham']['MaDM']) echo "selected" ?> value="<?php echo $item->MaDM ?>"><?php echo $item->TenDM ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="MaDM">Mã danh mục</label>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col" id="old-image">
                    <h5>Hình ban đầu</h5>
                    <img class="no-background" data-id="<?php echo $data['sanpham']['HinhAnh'] ?>" id="image" width="200" height="200" src="http://localhost/MVC_qlpt/Content/Images/<?php echo $data['sanpham']['HinhAnh'] ?>" alt="No image show">
                </div>
                <div class="col" id="new-image" style="display:none">
                    <h5>Hình mới</h5>
                    <img class="no-background" id="preview" width="200" height="200" alt="No image show">
                </div>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Hình ảnh sản phẩm</label>
                <input class="form-control" type="file" id="HinhAnh">
            </div>
        </div>    
    </div>
    <input type="submit" class="btn btn-success" id="submit" value="Lưu thay đổi"></input>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var preview = document.getElementById('preview');
    var input = document.getElementById('HinhAnh');
    input.onchange = evt => {
        const [file] = input.files
        if (file) {
            preview.src = URL.createObjectURL(file);
            document.getElementById("new-image").style.display="block";
        }
    }

    document.querySelector('#form1').addEventListener('submit', function(e) {
        e.preventDefault();
        var hinhanh = document.querySelector('#image').dataset.id;
        const masp = $('#MaSP').val();
        const tensp = $('#TenSP').val();
        const mota = $('#MoTa').val();
        const gia = $('#Gia').val();
        const tonkho = $('#TonKho').val();
        const danhmuc = $('#MaDM').val();
        const beforeImage = document.querySelector('#HinhAnh');
        if(beforeImage.files && beforeImage.files.length > 0) {
            var hinhanhInput = beforeImage.files[0];
            hinhanh =hinhanhInput.name;
        }

        var formData = new FormData();
        formData.append('id', masp)
        formData.append('name', tensp)
        formData.append('desc', mota)
        formData.append('price', gia)
        formData.append('inventory', tonkho)
        formData.append('image', hinhanh)
        formData.append('category', danhmuc)
        // $.ajax({
        //     type: "POST",
        //     url: "http://localhost/MVC_QLPT/suaSanPham/index",
        //     data: formData,
        //     cache: false,
        //     contentType: false,
        //     processData: false,
        //     success: function (response) {
        //         if(response.status === 200) {
        //             window.location.href = "../Sanpham/index";
        //         }
        //     }
        // });
        $.ajax({
            type: "POST",
            url: "http://localhost/MVC_QLPT/suaSanpham/index",
            data: JSON.stringify({
                name: tensp,
                desc: mota,
                price: gia,
                inventory: tonkho,
                image: hinhanh,
                category: danhmuc,
                id: masp,
            }),
            dataType: "json",
            success: function (response) {
                if(response.status === 200) {
                    alert("Lưu thay đổi thành công!");
                    window.location.href = "../../Sanpham/index";
                }
            },error: function(xhr, status, error) {
                console.log(xhr.responseText)
            }
        });
    })
</script>