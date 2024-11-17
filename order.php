<?php
include 'connect.php';

session_start();
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
    $user_id = '';
}
if(isset($_POST['logout'])){
    session_destroy();
    header("Location: admin_login.php");
    exit; // Nên gọi exit sau header để đảm bảo ngừng thực thi
}
?>
<style type="text/css">
    <?php include 'fontend.css'; ?>
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Green Tea - Order</title>
    <link rel="icon" href="img/download.png" type="image/png">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="main"> <!---HOME-->
        <div class="banner">
            <h1>Đơn hàng của tôi</h1>
        </div>
        <div class="title2">
            <a href="home.php">Home</a><span> / Cửa hàng của chúng tôi</span>
        </div>
        <section class="orders">
            <div class="box-container">
                <div class="title">
                    <img src="img/download.png" alt="" class="logo">
                    <h1>Đơn hàng của tôi</h1>
                    <p>Nguyễn Khắc Phước, Đào Quang Doanh, Nguyễn Phú Hải, Vũ Hải Long, Nguyễn Đức Toàn</p>
                </div>
            </div>
            <div class="box-container">
                <?php
                    $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ? ORDER BY date DESC");
                    $select_orders->execute([$user_id]);
                    if($select_orders->rowCount() > 0){
                        while($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)){
                            $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
                            $select_products->execute([$fetch_order['product_id']]);
                            if($select_products->rowCount() > 0){
                                $fetch_product = $select_products->fetch(PDO::FETCH_ASSOC);
                ?>
                                <div class="box" style="<?php if($fetch_order['status'] == 'cancelled') { echo 'border: 2px solid red'; } ?>">
                                    <a href="view_order.php?get_id=<?= $fetch_order['id']; ?>">
                                        <p class="date"><i class="bi bi-calendar-fill"></i> <span><?= $fetch_order['date']; ?></span></p>
                                        <img src="img/<?= $fetch_product['image']; ?>" alt="" class="image">
                                        <div class="row">
                                            <h3 class="name"><?= $fetch_product['name']; ?></h3>
                                            <p class="price">Giá: $<?= $fetch_order['price']; ?> x <?= $fetch_order['qty']; ?></p>
                                            <p class="status" style="color:<?php
                                                if($fetch_order['status'] == 'delivered'){
                                                    echo 'green';
                                                } elseif($fetch_order['status'] == 'cancelled'){
                                                    echo 'red';
                                                } else {
                                                    echo 'orange';
                                                }
                                            ?>"><?= $fetch_order['status']; ?></p>
                                        </div>
                                    </a>
                                </div>
                <?php
                            }
                        }
                    } else {
                        echo '<p class="empty">Không có đơn hàng nào</p>'; // Thay đổi thông báo lỗi thành tiếng Việt
                    }
                ?>
            </div>
            
        </section>
        <?php include 'footer.php'; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="fontend.js"></script>
    <?php include 'alert.php'; ?>
</body>
</html>
