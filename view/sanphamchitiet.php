<?php 
$html_dm = showdm($dsdm);
extract($spchitiet);
$imgn =IMG_PATH_USER.$img;
$html_sp_lienquan=showsp($splienquan);
?>

<div class="containerfull">
        <div class="bgbanner">SẢN PHẨM CHI TIẾT</div>
    </div>

    <section class="containerfull">
        <div class="container">
            <div class="boxleft mr2pt menutrai">
                <h1>DANH MỤC</h1><br><br>
                <?=$html_dm?>
                <!-- <a href="#">Cà phê</a>
                <a href="#">Trái cây</a>
                <a href="#">Trà</a>
                <a href="#">Bánh</a> -->
            </div>
            <div class="boxright">
                <h1>SẢN PHẨM CHI TIỂT</h1><br>
                <div class="containerfull mr30">
                    <div class="col6 imgchitiet">
                        <img src="<?=$imgn?>" alt="">
                    </div>
                    <div class="col6 textchitiet">
                        <h2><?=$name?></h2>
                        <p>$<?=$price?></p>
                     
            <form action="index.php?pg=addcart" method="post">
             <input type="hidden" name="tensp" value="<?=$name?>">
             <input type="hidden" name="idpro" value="<?=$id?>">
             <input type="hidden" name="img" value="<?=$img?>">
             <input type="hidden" name="price" value="<?=$price?>">
             Số Lượng <input type="number" value="1" name="soluong" id="" min="1" max="10" > 
             <button type="submit" name="addcart">Dặt hàng</button>
             </form>
                    </div>

                </div>
           

                <h1>SẢN PHẨM LIÊN QUAN</h1>
                <div class="containerfull mr30">
                    <?=$html_sp_lienquan?>
                  <!--   <div class="box25 mr15 mb">
                        <div class="best"></div>
                        <img src="layout/images/sp1.webp" alt="">
                        <span class="price">$1000</span>
                        <button>Đặt hàng</button>
                    </div>
                    <div class="box25 mr15 mb">
                        <img src="layout/images/sp2.webp" alt="">
                        <span class="price">$1000</span>
                        <button>Đặt hàng</button>
                    </div>
                    <div class="box25 mr15 mb">
                        <img src="layout/images/sp3.webp" alt="">
                        <span class="price">$1000</span>
                        <button>Đặt hàng</button>
                    </div>
                    <div class="box25 mr15 mb">
                        <img src="layout/images/sp4.webp" alt="">
                        <span class="price">$1000</span>
                        <button>Đặt hàng</button>
                    </div> -->
                    
                </div>
                <hr><div id="binhluan">
                <iframe src="view/binhluan.php?idpro=<?=$id?>" width="100%" height="500px" frameborder="0"></iframe>
                </div>
                <hr>
            </div>


        </div>
    </section>