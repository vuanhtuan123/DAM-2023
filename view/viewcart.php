<?php 
$html_cart= viewcart();
?>

<div class="containerfull">
        <div class="bgbanner">Giỏ Hàng</div>
    </div>

    <section class="containerfull">
        <div class="container">
            <div class="col9 viewcart">
                <h2>ĐƠN HÀNG</h2>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Hình</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
       <?=$html_cart?>
                

            </table>
            <a href="index.php?pg=viewcart&del=1"><button class="delete" >Xoá ALl</button></a>
        </div>
        <div class="col3">
            <h2>ĐƠN HÀNG</h2>
            <div class="total">
                <h3>Tổng: <?=$tongdonhang?></h3>
            </div>
            <div class="coupon">
                <form action="index.php?pg=viewcart&voucher=1" method="post" >
                    <input type="hidden" name="tongdonhang" value="<?=$tongdonhang?>" >
                <input class="mavocher"  type="text" name="mavoucher"  placeholder="Nhập voucher">
                <button type="submit" >Áp Mã</button>
                </form>
              
            </div>
            <div class="total">
                <h3>Tổng thanh toán: <?=$thanhtoan?></h3>
            </div>
            <a href="index.php?pg=donhang">
              <button> Tiếp tục thanh toán</button>
            </a>
        </div>


        </div>
    </section>