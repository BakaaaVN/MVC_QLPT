<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" type="text/css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
<a href="../SanPham/Add" class="btn btn-primary">Thêm sản phẩm mới</a>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Giá</th>
                <th>Tồn kho</th>
                <th>Hình Ảnh</th>
                <th>Mã danh mục</th>
                <th width="15%">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['sanpham'] as $item) : ?>
                <tr>
                    <td><?php echo $item->TenSP ?></td>
                    <td><?php echo $item->MoTa ?></td>
                    <td><?php echo number_format($item->Gia, 0, '', ',') . "đ" ?></td>
                    <td><?php echo $item->TonKho ?></td>
                    <td><img src="../Content/Images/<?php echo $item->HinhAnh ?>" height="50" width="50" alt="Không có ảnh minh hoạ"></td>
                    <td><?php echo $item->MaDM ?></td>
                    <td>
                        <a class="btn btn-success" href="../SanPham/Details/<?php echo $item->MaSP ?>">Details</a>
                        <a class="btn btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $item->MaSP ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
        </tbody>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xoá sản phẩm</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bạn có muốn xoá <span id="product-id"></span>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <form>
            <input type="hidden" id="ID" name="ID">
            <button type="submit" class="btnModel btn btn-danger">Xoá</button>
          </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
<script>
    new DataTable('#example');

    $('#example').on('click', '.delete-btn', function() {
            var productId = $(this).data('id');
            $('#product-id').text(productId);
            document.getElementById("ID").value = productId;
            $('.confirm-delete-btn').data('id', productId);
        });
   
</script>
<script>
 document.querySelectorAll(".btnModel").forEach((button,index)=>{
  button.addEventListener('click',(e)=>{
    e.preventDefault();
    const node = button.parentElement;
    const id = node.querySelector('input#ID').value;
    if(id){
      $.ajax({
        type: "POST",
        url: "http://localhost/MVC_qlpt/SanPham/Delete/",
        data: JSON.stringify({
          id:id,
        }),
        dataType: "json",
        success: function (response) {
          console.log(response);
          if(response.status === 200){
            location.reload();
          }
        }
      });
    }
  })
 })
</script>