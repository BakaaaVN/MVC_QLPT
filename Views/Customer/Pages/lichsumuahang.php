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
    <h5>Lịch sử mua hàng</h5>
    <?php if(isset($data['Order'])) : ?>
        <table id="order" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th style="text-align:center">Tổng tiền</th>
                    <th style="text-align:center">Phương thức thanh toán</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['Order'] as $item) : ?>
                    <tr>
                        <td><?php echo $item->MaDH ?></td>
                        <td style="text-align:center"><?php echo $item->NgayDat ?></td>
                        <td style="text-align:right"><?php echo number_format($item->TongTien, 0, '', '.') . "đ" ?></td>
                        <td style="text-align:center"><?php echo $item->PhuongThuc?></td>
                        <td><?php echo $item->TrangThai ?></td>
                        <td><a href="../Account/orderDetail/<?php echo $item->MaDH ?>">Chi tiết</a></td>
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