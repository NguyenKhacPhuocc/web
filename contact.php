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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Green Tea - Contacts</title>
    <link rel="icon" href="img/download.png" type="image/png">
</head>
<body>
    <?php  include 'header.php'; ?>
    <div class="main">
        <div class="banner">
            <h1>Liên hệ chúng tôi</h1>
        </div>
        <div class="title2">
            <a href="home.php">home</a><span> / Liên hệ</span>
        </div>
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
                <h3>Vận chuyển</h3>
                <p>Vận chuyển toàn quốc</p>
               </div>
            </div>
        </div>
    </section>
    <div class="form-container">
        <form method="post">
            <div class = "title">
                <img src="img/download.png" class = "logo">
                <h1>GỬi tin nhắn</h1>
            </div>
            <div class ="input-field">
                <p>your name <sup>*</sup></p>
                <input type="text" name = "name">
            </div>
            <div class ="input-field">
                <p>your email <sup>*</sup></p>
                <input type="email" name = "email">
            </div>
            <div class ="input-field">
                <p>your number <sup>*</sup></p>
                <input type="text" name = "number">
            </div>
            <div class ="input-field">
                <p>your message <sup>*</sup></p>
                <textarea name="message" id=""></textarea>
            </div>
            <button type="submit" name = "submit-btn" class="btn">send message</button>
        </form>
    </div>
    <div class= " address">
        <div class = "title">
            <img src="img/download.png" class = "logo">
            <h1>Chi tiết liên hệ</h1>
            <p>Nguyễn Khắc Phước, Đào Quang Doanh, Nguyễn Phú Hải, Vũ Hải Long, Nguyễn Đức Toàn</p>
        </div>
        <div class = "box-container">
            <div class = "box">
                <i class = "bx bxs-map-pin"></i>
                <div>
                    <h4>Địa chỉ</h4>
                    <p>Trường Đại Học Công Nghệ GTVT</p>
                </div>
            </div>
            <div class = "box">
                <i class = "bx bxs-phone-call"></i>
                <div>
                    <h4>Số điện thoại</h4>
                    <p>091836847</p>
                </div>
            </div>
            <div class = "box">
                <i class = "bx bxs-map-pin"></i>
                <div>
                    <h4>email</h4>
                    <p>nguyenvana@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
        <?php include 'footer.php' ; ?>
     </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src = "fontend.js" ></script>
    <?php  include 'alert.php'; ?>
</body>
</html>