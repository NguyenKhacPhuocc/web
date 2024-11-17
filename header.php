
<header class="header">
    <div class="flex">
        <a href="home.php" class = "logo" ><img  src ="img/logo.jpg"></a>
        <nav class = "navbar">
              <a href ="home.php">home</a>
              <a href ="view_products.php">products</a>
              <a href ="order.php">orders</a>
              <a href ="about.php">about us</a>
              <a href ="contact.php">contact us</a>
        </nav>
        
        <div class="icons">
           <i class="bx bxs-user" id="user-btn"></i>
           <?php
                $count_wishlist_items = $conn->prepare("select * from `wishlist` where user_id = ?");
                $count_wishlist_items->execute([$user_id]);
                $total_wishlist_items = $count_wishlist_items->rowCount();
           ?>
           <a href="wishlist.php" class="cart-btn" style="margin-right: .3rem;"><i class ="bx bx-heart"> </i><sup style ="position: absolute;"><?=$total_wishlist_items?></sup></a>
           <?php
                $count_cart_items = $conn->prepare("select * from `cart` where user_id = ?");
                $count_cart_items->execute([$user_id]);
                $total_cart_items = $count_cart_items->rowCount();
           ?>
           <a href="cart.php" class="cart-btn" style="margin-right: 1.5rem;"><i class="bx bx-cart-download" ></i><sup style ="position: absolute;"><?=$total_cart_items?></sup></a>
           
           <i class="bx bx-list-plus" id="menu-btn" style="font-size: 2rem;"></i>
        </div>

        <div class="user-box" >
            <p>username : <span><?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ''; ?></span></p> 
            <!-- isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ''; :: sử dụng để kiểm tra xem các biến này có được thiết lập hay không. Nếu không, giá trị mặc định "" sẽ được hiển thị-->
            <p>email : <span> <?php echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';  ?></span></p>
            <a href="admin_login.php" class="btn" style = "color: #000">login</a>
            <a href="register.php" class="btn" style = "color: #000">register</a>
            <form method="post">
                <button type = "submit" name="logout" class="logout-btn">log out</button>
            </form>
        </div>
    </div>
</header>