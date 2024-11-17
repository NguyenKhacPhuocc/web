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
//adding products in wishlist
if(isset($_POST['add_to_wishlist'])){
    $id = unique_id();
    $product_id = $_POST['product_id'];

    $varify_wishlist = $conn->prepare("select * from `wishlist` where user_id = ? and product_id = ?");
    $varify_wishlist->execute([$user_id,$product_id]);

    if($varify_wishlist->rowCount()>0){
        $warning_msg[] = 'product already exist in your wishlist';
    }else{
        $select_price = $conn->prepare("select *from `products` where id = ? LIMIT 1");
        $select_price->execute([$product_id]);
        $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

        $insert_wishlist = $conn->prepare("INSERT INTO `wishlist` (id, user_id, product_id, price) VALUES (?, ?, ?, ?)");
        $insert_wishlist->execute([$id, $user_id, $product_id, $fetch_price['price']]);
        $success_msg[] = 'Product added to wishlist successfully';
        
    }
}
//adding products in cart
if(isset($_POST['add_to_cart'])){
    $id = unique_id();
    $product_id = $_POST['product_id'];
    $qty = $_POST['qty'];
    $qty = filter_var($qty, FILTER_SANITIZE_STRING);

    $varify_cart = $conn->prepare("select * from `cart` where user_id = ? and product_id = ?");
    $varify_cart->execute([$user_id,$product_id]);
    $max_cart_items = $conn->prepare("select *from `cart` where user_id = ?");
    $max_cart_items->execute([$user_id]);

    if($varify_cart->rowCount()>0){
        $warning_msg[] = 'product already exist in your cart';
    }else if($max_cart_items->rowCount()>20){
        $warning_msg[] = 'cart is full';
    }else{
        $select_price = $conn->prepare("select *from `products` where id = ? LIMIT 1");
        $select_price->execute([$product_id]);
        $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);

        $insert_cart = $conn->prepare("insert into `cart` (id, user_id, product_id,price,qty) values(?,?,?,?,?)");
        $insert_cart->execute([$id,$user_id, $product_id, $fetch_price['price'], $qty]);
        $success_msg[] = 'product added to cart successfully';
    }
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
    <title>Green Tea - Shop</title>
</head>
<body>
    <?php  include 'header.php'; ?>

    <div class="main"> <!---HOME-->
       <div class="banner">
          <h1>Shop</h1>
       </div>
        <div class="title2">
            <a href="home.php">home /</a><span> Sản phẩm</span>
        </div>
        <section class = "products">
            <div class = "box-container">
                <?php 
                    $select_products = $conn->prepare("select * from `products` where status = 'active'");
                    $select_products->execute();
                    if($select_products->rowCount() > 0){
                        while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
                ?>
                <form action="" method="post" class="box">
                    <img src="img/<?php echo $fetch_products['image']; ?>" class="img">
                    <div class="button">
                        <button type="submit" name="add_to_cart"><i class="bx bx-cart"></i></button>
                        <button type="submit" name="add_to_wishlist"><i class="bx bx-heart"></i></button>
                        <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="bx bxs-show"></a>
                    </div>
                    <h3 class = "name"><?=$fetch_products['name']; ?></h3>
                    <input type="hidden" name = "product_id" value = "<?=$fetch_products['id']; ?>">
                    <div class = "flex">
                        <p class = "price">Giá: <?=$fetch_products['price']; ?>đ</p>
                        <input type = "number" name = "qty" required min = "1" value = "1" max = "99" maxlength = "2" class = "qty">
                    </div>
                    <a href="checkout.php?get_id=<?=$fetch_products['id']; ?>" class = "btn">Mua</a>
                </form>
                <?php
                        }
                    }else{
                        echo '<p class = "empty">Chưa có sản phẩm nào</p>';
                    }
                ?>
            </div>
        </section>
        <?php include 'footer.php' ; ?>
     </div>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src = "fontend.js" ></script>
    <?php  include 'alert.php'; ?>

    
</body>

</html>