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
    header("location:admin_login.php");
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
    <title>Green Tea - About us</title>
</head>
<body>
    <?php  include 'header.php'; ?>


    <div class="main"> <!---HOME-->
        <div class="banner">
            <h1>about us</h1>
        </div>
        <div class="title2">
            <a href="home.php">home / </a><span>Giới thiệu</span>
        </div>
        <div class="about-category">
              <div class="box">
                <img src="img/0.jpg">
                <div class="detail">
                    <span>COFFEE</span>
                    <h1>Green Coffee</h1>
                    <a href="view_products.php" class="btn">xem</a>
                </div>
              </div>

              <div class="box">
                <img src="img/3.png">
                <div class="detail">
                    <span>COFFEE</span>
                    <h1>Green Coffee</h1>
                    <a href="view_products.php" class="btn">xem</a>
                </div>
              </div>

              <div class="box">
                <img src="img/3.webp">
                <div class="detail">
                    <span>COFFEE</span>
                    <h1>Lemon Coffee</h1>
                    <a href="view_products.php" class="btn">xem</a>
                </div>
              </div>

              <div class="box">
                <img src="img/5.webp">
                <div class="detail">
                    <span>COFFEE</span>
                    <h1>Green Coffee</h1>
                    <a href="view_products.php" class="btn">xem</a>
                </div>
              </div>
              
              <div class="box">
                <img src="img/1.webp">
                <div class="detail">
                    <span>COFFEE</span>
                    <h1>Fresh Fruit</h1>
                    <a href="view_products.php" class="btn">xem</a>
                </div>
              </div>

              <div class="box">
                <img src="img/2.webp">
                <div class="detail">
                    <span>COFFEE</span>
                    <h1>Fresh Fruit</h1>
                    <a href="view_products.php" class="btn">xem</a>
                </div>
              </div>
        </div>

        <section class = "services">
            <div class="title">
                <img class="logo" src="img/download.png">
                <h1>Why choose us</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat magni eos ipsam, officia eaque cumque odit neque nihil saepe ab odio quasi dolor aliquid aperiam necessitatibus vel quas harum. Quis!</p>
            </div>
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
    <div class="about">
        <div class="row">
            <div class="img-box">
                <img src="img/3.png">
            </div>
            <div class="detail">
                <h1>visit our beautiful shop!</h1>
                 <p>Welcome to our fruit shop, where we offer the freshest and most nutritious fruits.
                     We take pride in providing our customers with clean, safe products, carefully selected from reputable farms. Come and experience the delightful natural flavors with us today!</p>
            <a href="view_products.php" class="btn">xem</a>
                    </div>
        </div>
    </div>
        <div class="testimonial-container">
            <div class="title">
                <img src="img/download.png" class="logo">
                <h1>what people say about us</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate perspiciatis sint optio quidem in nihil corrupti obcaecati reprehenderit dolorem numquam tempora, id similique aperiam quod pariatur sunt odit officiis porro.</p>
            </div> 
                <div class="container">
                    <div class="testimonial-item active">
                        <img src="img/02.jpg">
                        <h1>Quang Doanh</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non molestias dolore aliquid, voluptatum harum nam. Soluta veniam blanditiis magnam officia facilis saepe quaerat ea sit, quidem beatae aut. Nostrum, blanditiis?</p>
                    </div>
                    <div class="testimonial-item ">
                        <img src="img/03.jpg">
                        <h1>Quang Doanh</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non molestias dolore aliquid, voluptatum harum nam. Soluta veniam blanditiis magnam officia facilis saepe quaerat ea sit, quidem beatae aut. Nostrum, blanditiis?</p>
                    </div> 
                    <div class="testimonial-item">
                        <img src="img/04.png">
                        <h1>Phu Hai</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non molestias dolore aliquid, voluptatum harum nam. Soluta veniam blanditiis magnam officia facilis saepe quaerat ea sit, quidem beatae aut. Nostrum, blanditiis?</p>
                    </div>
                    <div class="testimonial-item">
                        <img src="img/01.jpg">
                        <h1>Duc Toan</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non molestias dolore aliquid, voluptatum harum nam. Soluta veniam blanditiis magnam officia facilis saepe quaerat ea sit, quidem beatae aut. Nostrum, blanditiis?</p>
                    </div>
                    <div class="left-arrow" onclick="prevSlide()"><i class="bx bxs-left-arrow-alt"></i></div>
                    <div class="right-arrow"onclick="nextSlide()"><i class="bx bxs-right-arrow-alt"></i></div>
                </div>
           
        </div>
        <?php include 'footer.php' ; ?>
     </div>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src = "fontend.js" ></script>
    <?php  include 'alert.php'; ?>

    
</body>

</html>