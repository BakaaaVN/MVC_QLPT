
<div class="overview-boxes">
    <div class="box">
        <div class="right-side">
            <div class="box-topic">Tổng khách hàng</div>
            <div class="number">
                <?php echo $data['trangchu']['usercount']; ?>
                </div>
                <div class="indicator">
                    <i class='bx bx-up-arrow-alt'></i>
                    <span class="text">Up to date</span>
                </div>
            </div>
        <i class='bx bx-user-circle bx-tada cart one'></i>
    </div>
    <div class="box">
            <div class="right-side">
                <div class="box-topic">Tổng sản phẩm</div>
                <div class="number">
                <?php echo $data['trangchu']['productcount']; ?>
                </div>
                <div class="indicator">
                    <i class='bx bx-up-arrow-alt'></i>
                    <span class="text">Up to date</span>
                </div>
            </div>
            <i class='bx  bxs-user-pin bx-flashing cart two'></i>
    </div>
    <div class="box">
            <div class="right-side">
                <div class="box-topic">Tổng số đơn hàng</div>
                <div class="number">
                <?php echo $data['trangchu']['ordercount']; ?>
                </div>
                <div class="indicator">
                    <i class='bx bx-up-arrow-alt'></i>
                    <span class="text">Up to date</span>
                </div>
            </div>
            <i class='bx bxs-info-circle bx-spin cart three'></i>
    </div>
    <div class="box">
            <div class="right-side">
                <div class="box-topic">Tổng thu nhập</div>
                <div class="number">
                <?php echo number_format($data['trangchu']['sumprofit']->sumprofit, 0, '', ',') . "đ" ?>
                </div>
                <div class="indicator">
                    <i class='bx bx-up-arrow-alt'></i>
                    <span class="text">Up to date</span>
                </div>
            </div>
            <i class='bx bxs-home-smile bx-tada cart four'></i>
    </div>
    <div>
        <canvas id="myChart"></canvas>
    </div>
</div>