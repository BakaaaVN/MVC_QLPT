<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<h2 style="text-align:center;">Chỉnh sửa thông tin đơn hàng</h2>

<form name="form1" id="form1" action="../../suaDonHang/index" method="post" enctype="multipart/form-data" style="text-align:center; width:95%; margin: 0 auto;">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="MaDH" value="<?php echo $data['donhang']['MaDH'] ?>" placeholder="Mã đơn hàng" disabled>
                <label for="MaDH">Mã đơn hàng</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="MaKH" value="<?php echo $data['donhang']['MaKH'] ?>" placeholder="Mã khách hàng" disabled>
                <label for="MaKH">Mã khách hàng</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="NgayDat" value="<?php echo $data['donhang']['NgayDat'] ?>" placeholder="Ngày đặt" disabled>
                <label for="NgayDat">Ngày đặt</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="DuKien" value="<?php echo $data['donhang']['DuKien'] ?>" placeholder="Dự kiến" required>
                <label for="DuKien">Dự kiến</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="PhuongThuc" value="<?php echo $data['donhang']['PhuongThuc'] ?>" placeholder="Phương thức" disabled>
                <label for="PhuongThuc">Phương thức</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="TongTien" value="<?php echo $data['donhang']['TongTien'] ?>" placeholder="Thành tiền" disabled>
                <label for="TongTien">Thành tiền</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="TrangThai" value="<?php echo $data['donhang']['TrangThai'] ?>" placeholder="Trạng thái" required pattern="[A-Za-zÀ-ỹ\s]+">
                <label for="TrangThai">Trạng thái</label>
            </div>
        </div>   
    </div>
    <input type="submit" class="btn btn-success" id="submit" value="Lưu thay đổi"></input>
    <a class="btn btn-primary" href="../../ChiTietDonHang/Details/<?php echo $data['donhang']['MaDH'] ?>">Chi tiết đơn hàng</a>
    <a class="btn btn-primary" href="../../GiaoHang/Details/<?php echo $data['donhang']['MaDH'] ?>">Thông tin giao hàng</a>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    
    document.querySelector('#form1').addEventListener('submit', function(e) {
        e.preventDefault();
        const madh = $('#MaDH').val();
        const dukien = $('#DuKien').val();
        const trangthai = $('#TrangThai').val();

        var formData = new FormData();
        formData.append('id', madh)
        formData.append('estimate', dukien)
        formData.append('status', trangthai)
        $.ajax({
            type: "POST",
            url: "http://localhost/MVC_QLPT/suaDonHang/index",
            data: JSON.stringify({
                estimate: dukien,
                status: trangthai,
                id: madh,
            }),
            dataType: "json",
            success: function (response) {
                if(response.status === 200) {
                    alert("Lưu thay đổi thành công!");
                    window.location.href = "../../DonHang/index";
                }
            },error: function(xhr, status, error) {
                console.log(xhr.responseText)
            }
        });
    })
</script>