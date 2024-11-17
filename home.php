<?php
include 'connect.php';

session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
   $user_id='';
}
if(isset($_POST['logout'])){
    session_destroy();
    header("location:home.php");
    
}
?>
<style type="text/css">
    <?php  include 'fontend.css'; ?>
   
</style>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/download.png" type="image/png">
    <title>Green Tea</title>
</head>
<body>
    <?php  include 'header.php'; ?>


    <div class="main"> <!---HOME-->
      <section class="home-section">
      <div class="slider" >
          <div class="slider_slider slide1">
            <div class="overlay"></div>
                <div class="slide-detail">                   
                     <h1>Chào mừng đến với của hàng GREEN-TEA</h1>
                     <p>VŨ HẢI LONG</p>
                     <a href="view_products.php" class="btn">xem cửa hàng</a>
                    </div>
            <div class="hero-dec-top"></div>
            <div class="hero-dec-bottom"></div>
        </div> 
             <!-- slide end -->
             <div class="slider_slider slide2">
            <div class="overlay"></div>
                <div class="slide-detail">                   
                     <h1>Nhiều người tin tưởng</h1>
                     <p>NGUYỄN KHẮC PHƯỚC</p>
                     <a href="view_products.php" class="btn">xem cửa hàng</a>
                    </div>
            <div class="hero-dec-top"></div>
            <div class="hero-dec-bottom"></div>
        </div> 
             <!-- slide end -->
             <div class="slider_slider slide3">
            <div class="overlay"></div>
                <div class="slide-detail">                   
                     <h1>Hân hạnh phục vụ</h1>
                     <p>ĐÀO QUANG DOANH</p>
                     <a href="view_products.php" class="btn">xem cửa hàng</a>
                    </div>
            <div class="hero-dec-top"></div>
            <div class="hero-dec-bottom"></div>
        </div> 
             <!-- slide end -->    
             <div class="slider_slider slide4">
            <div class="overlay"></div>
                <div class="slide-detail">                   
                     <h1>Mang đến sự hài lòng và uy tín</h1>
                     <p>NGUYỄN PHÚ HẢI</p>
                     <a href="view_products.php" class="btn">xem cửa hàng</a>
                    </div>
            <div class="hero-dec-top"></div>
            <div class="hero-dec-bottom"></div>
        </div> 
             <!-- slide end -->  
             <div class="slider_slider slide5">
            <div class="overlay"></div>
                <div class="slide-detail">                   
                     <h1>Dịch vụ 5*</h1>
                     <p >NGUYỄN ĐỨC TOÀN</p>
                     <a href="view_products.php" class="btn">xem cửa hàng</a>
                    </div>
            <div class="hero-dec-top"></div>
            <div class="hero-dec-bottom"></div>
        </div> 
             <!-- slide end -->  
             <div class="left-arrow"><i class='bx bxs-left-arrow'></i></div>
             <div class="right-arrow"><i class='bx bxs-right-arrow'></i></div>                      
        </div>
      </section>
        <!--home slide end-->
     <section class="thumb">
         <div class ="box-container">
             <div class = "box">
                <img src="img/thumb2.jpg" alt="">
                <h3>Green</h3>
                <p>Nguyễn Khắc Phước, Đào Quang Doanh, Nguyễn Phú Hải, Vũ Hải Long, Nguyễn Đức Toàn</p>
                <i class="bx bx-chevron-right"></i>
             </div>

             <div class = "box">
                <img src ="img/thumb0.jpg" >
                <h3>Lemon Tea</h3>
                <p>Nguyễn Khắc Phước, Đào Quang Doanh, Nguyễn Phú Hải, Vũ Hải Long, Nguyễn Đức Toàn</p>
                <i class="bx bx-chevron-right"></i>
             </div>

             <div class = "box">
                <img src ="img/thumb1.jpg" >
                <h3>Green tea</h3>
                <p>Nguyễn Khắc Phước, Đào Quang Doanh, Nguyễn Phú Hải, Vũ Hải Long, Nguyễn Đức Toàn</p>
                <i class="bx bx-chevron-right"></i>
             </div>

             <div class = "box">
                <img src ="img/thumb.jpg" >
                <h3>Green Tea</h3>
                <p>Nguyễn Khắc Phước, Đào Quang Doanh, Nguyễn Phú Hải, Vũ Hải Long, Nguyễn Đức Toàn</p>
                <i class="bx bx-chevron-right"></i>
             </div>           
         </div>
     </section>
     
     <section class="container">
        <div class="box-container">
              <div class = "box">
                <img src ="img/about-us.jpg">
              </div>
            <div class="box">
              <img src ="img/download.png">
              <span>healthy food</span>
              <h1>save up to 50% off</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum accusamus rem reiciendis omnis quo delectus officiis ipsa veritatis earum recusandae?</p>
            </div>
        </div>
     </section>
    <section class="shop">
        <div class="title">
            <img src="img/download.png">
            <h1>Trending Products</h1>
        </div>
       <div class="row">
           <img src="img/about.jpg">
            <div class = "row-detail">
                 <img src="img/basil.jpg">
                  <div class ="top-footer">
                      <h1>Fruit make you healthy everyone</h1>
                  </div>
             </div>
        </div>
        <div class = "box-container">
        <div class="box">
                <img src="img/card.jpg">
                <a href="view_products.php" class="btn">xem cửa hàng</a>
            </div>

            <div class="box">
                <img src="img/card0.jpg">
                <a href="view_products.php" class="btn">xem cửa hàng</a>
            </div>

            <div class="box">
                <img src="img/card1.jpg">
                <a href="view_products.php"class="btn">xem cửa hàng</a>
            </div>

            <div class="box">
                <img src="img/card2.jpg">
                <a href="view_products.php"class="btn">xem cửa hàng</a>
            </div>
            <div class="box">
                <img src="img/6.webp">
                <a href="view_products.php"class="btn">xem cửa hàng</a>
            </div>

            <div class="box">
                <img src="img/card2.jpg">
                <a href="view_products.php"class="btn">xem cửa hàng</a>
            </div>

           

        </div>

      
    </section>
    

     <section class="shop-category">
        <div class="box-container">
            <div class="box">
                <img src="img/6.jpg">
                <div class="detail">
                    <span>BIG OFFERS</span>
                    <h1>Extra 15% off</h1>
                    <a href="view_products.php"class="btn">xem cửa hàng</a>
                </div>
            </div>
            <div class="box">
                <img src="img/7.jpg">
                <div class="detail">
                    <span>NEW IN FRUIT</span>
                    <h1>FRUIT</h1>
                    <a href="view_products.php"class="btn">xem cửa hàng</a>
                </div>
            </div>
        </div>
     </section>
    <section class = "services">
        <div class="box-container">
            <div class="box">
               <img src="img/icon2.png">
               <div class="detail">
                <h3>great saving</h3>
                <p>save big every order</p>
               </div>
            </div>

            <div class="box">
               <img src="img/icon1.png">
               <div class="detail">
                <h3>24*7</h3>
                <p>one-on-one support</p>
               </div>
            </div>

            <div class="box">
               <img src="img/icon0.png">
               <div class="detail">
                <h3>gift vouchers</h3>
                <p>vochers on every festivals</p>
               </div>
            </div>

            <div class="box">
               <img src="img/icon.png">
               <div class="detail">
                <h3>world delivery</h3>
                <p>dropship world</p>
               </div>
            </div>
        </div>
    </section>
    <section class="brand">
          <div class="box-container">
              <div class="box">
                <img src="img/brand (1).jpg">
              </div>

              <div class="box">
                <img src="img/brand (2).jpg">
              </div>

              <div class="box">
                <img src="img/brand (3).jpg">
              </div>

              <div class="box">
                <img src="img/brand (4).jpg">
              </div>

              <div class="box">
                <img src="img/brand (5).jpg">
              </div>
          </div>
    </section>
        <?php include 'footer.php' ; ?>
     </div>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src = "fontend.js" ></script>
    <?php  include 'alert.php'; ?>

    
</body>

</html>