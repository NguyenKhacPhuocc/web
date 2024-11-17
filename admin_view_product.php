<?php
include 'connect.php';
session_start();

$admin_id = $_SESSION['admin_id'];
if(!isset ($admin_id)){
    header('location:admin_login.php');
}
    //delete product
    if(isset($_POST['delete'])){
        $p_id = $_POST['product_id'];
        $p_id = filter_var($p_id,FILTER_SANITIZE_STRING);

        $delete_product = $conn->prepare("delete from `products` where id = ?");
        $delete_product->execute([$p_id]);

        $success_msg[] = 'product deleted successfully';
    }
?>
<style type="text/css">
    <?php  include 'backend.css'; 
    
    echo time();
    ?>
</style>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel ="stylesheet" type = "text/css" href="backend.css?v=<?php echo time(); ?>">

    
    <title>GREEN-TEA view product</title>
</head>
<body>
    <?php include 'admin_header.php'; ?>
    <div class = "main">
        <div class = "banner">
            <h1>all products</h1>
        </div>
        <div class = "title2">
            <a href="dashboard.php">dashboard</a><span> / all products</span>
        </div>
        <section class = "show-post">
            <h1 class = "heading">all products</h1>
            <div class = "box-container">
                <?php
                    $select_products = $conn->prepare("select * from `products`");
                    $select_products->execute();
                    if($select_products->rowCount() > 0){
                        while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){

                ?>
                <form action="" method = "post" class = "box">
                    <input type="hidden" name="product_id" value="<?= $fetch_products['id'];?>">
                    <?php if($fetch_products['image'] != ''){?>
                        <!-- "../img/" -->
                        <img src="img/<?= $fetch_products['image']; ?>" alt="" class = "image">
                    <?php } ?>
                    <div class = "status" style="color: <?php if($fetch_products['status']=='active'){echo "green";}else{echo "red";} ?>;"><?= $fetch_products['status']; ?></div>
                    <div class = "price"><?= $fetch_products['price']; ?>đ</div>
                    <div class = "title"><?= $fetch_products['name']; ?></div>
                    <div class="flex-btn">
                        <a href="edit_product.php?id=<?= $fetch_products['id']; ?>" class = "btn">edit</a>
                        <button type = "submit" name ="delete" class="btn" onclick="return confirm('delete this product');">delete</button>
                        <a href="read_product.php?post_id=<?=$fetch_products['id']; ?>" class = "btn">view</a>
                    </div>
                </form>
                <?php
                        }
                    }else{
                        echo '<div class = "empty">
                                <p>no product added yet! <br> <a href="add_products.php" style ="margin-top: 1.5rem;" class = "btn">add product</a></p>
                            </div>';
                    }
                ?>
            </div>
            
        </section>
    </div>




        <!-- sweetalert cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> 
 <!-- sweetalert js link -->
    <script src = "backend.js" ></script>
     <!-- alert -->
     <?php  include 'alert.php'; ?>
</body>

</html>