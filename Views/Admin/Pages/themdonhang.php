<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<h2 style="text-align:center;">Tạo đơn hàng mới </h2>

<form id="form1" enctype="multipart/form-data" style="text-align:center; width:95%; margin: 0 auto;">
    <div class="row">
        <div class="col-5">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="MaSP" placeholder="Mã sản phẩm" required autofocus pattern="[A-Z\s\d]+">
                <label for="MaSP">Mã đơn hàng</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="TenSP"placeholder="Tên sản phẩm" required>
                <label for="TenSP">Tên khách hàng</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="MoTa" placeholder="Mô tả sản phẩm" required>
                <label for="MoTa">Mô tả sản phẩm</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="Gia" placeholder="Giá sản phẩm" required pattern="/d+">
                <label for="Gia">Giá</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="TonKho" placeholder="Sản phẩm trong kho" required pattern="/d+">
                <label for="TonKho">Tồn kho</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="MaDM">
                    <?php foreach($data['danhmuc'] as $item) : ?>
                        <option value="0" select hidden>Chọn danh mục...</option>
                        <option value="<?php echo $item->MaDM ?>"><?php echo $item->TenDM ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="MaDM">Mã danh mục</label>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col" id="new-image">
                    <img class="no-background" id="preview" width="200" height="200" alt="No image show">
                </div>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Hình ảnh sản phẩm</label>
                <input accept="image/*" class="form-control" type="file" id="HinhAnh">
            </div>
        </div>    
    </div>
    <input type="submit" class="btn btn-success" id="btn-add" value="Lưu thay đổi"></input>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>