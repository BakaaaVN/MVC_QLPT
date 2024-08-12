<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" type="text/css">
<style>
    .nohistory {
        margin-left: auto;
        margin-right: auto;
        text-align:center;
    }
    .order-frame {
        display: flex;
        border-bottom: 1px solid #eaeaea;
    }
    .order-frame .order-box {
        flex: 1;
    }
</style>
<div>
    <div style="display: flex">
        <h5 style="flex: 1">Thông tin đơn hàng <?php echo $data['id']?></h5>
        <a href="../../Account/orderHistory" style="flex: 1;text-align:right">Trở về <i class="bi bi-arrow-90deg-left"></i></a>
    </div>
    <?php if(isset($data['Order'])) : ?>
        <table id="order" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th style="text-align:center">Hình ảnh</th>
                    <th style="text-align:center">Giá</th>
                    <th style="text-align:center">Số lượng</th>
                    <th style="text-align:center">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['Order'] as $item) : ?>
                    <tr>
                        <td><?php echo $item->TenSP ?></td>
                        <td style="text-align:center"><img width="50" height="50" src="../../Content/Images/<?php echo $item->HinhAnh ?>" alt="Không có hình"></td>
                        <td><?php echo number_format($item->Gia, 0, '', '.') . "đ" ?></td>
                        <td style="text-align:center"><?php echo $item->SoLuong ?></td>
                        <td style="text-align:center"><?php echo number_format($item->ThanhTien, 0, '', '.') . "đ" ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="nohistory">
            <i style="font-size:80px;" class="bi bi-card-list"></i>
            <h4>Không có đơn hàng nào</h4>
            <p style="width:400px; margin: 0 auto; margin-bottom: 20px;">Hãy thêm sản phẩm vào giỏ hàng và tạo đơn hàng của bạn ngay hôm nay!</p>
            <button class="btn btn-primary">Mua ngay!</button>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>  

<script>
    $('document').ready(function(e) {
        new DataTable('#order');
    })
</script>