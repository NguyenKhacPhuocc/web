<?php
include 'connect.php';
session_start();

$admin_id = $_SESSION['admin_id'];
if(!isset ($admin_id)){
    header('location:admin_login.php');
}
    //update product

    if(isset($_POST['update'])){
        $post_id = $_GET['id'];
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        $price = $_POST['price'];
        if($price % 1 != 0){
            $warning_msg[] ='loi';
            header('location: edit_product.php');
        }
        $price = filter_var($price, FILTER_SANITIZE_STRING);

        $content = $_POST['content'];
        $content = filter_var($content, FILTER_SANITIZE_STRING);
            
        $status= $_POST['status'];
        $status = filter_var($status, FILTER_SANITIZE_STRING);
        //update product
        $update_product = $conn->prepare("update `products` set name = ?, price =?, product_detail = ?, status = ? where id = ?");
        $update_product->execute([$name, $price, $content, $status, $post_id]);
        $success_msg[] = 'product updated';
        $old_image =  $_POST['old_image'];

        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_STRING);
        $image_size =$_FILES['image']['size'];
        $image_tmp_name ='C:\xampp\htdocs\img';
        $image_folder = '../image/' .$image;
        $select_image = $conn->prepare("select * from `products` where image = ?");
        $select_image->execute([$image]);
        if(!empty($image)){
            if($image_size > 2000000) {
                $warning_msg[] = 'image size is too large';
            }else if($select_image->rowCount() > 0 AND $image != ''){
                $warning_msg[] = 'please rename your image';
            }else{
                $update_image = $conn->prepare("update `products` set image = ? where id = ?");
                $update_image->execute([$image, $post_id]);
                move_uploaded_file($image_tmp_name,$image_folder);
                if($old_image!= $image and $old_image != ''){
                    unlink('img/'.$old_image);
                }
                $success_msg[] = 'image updated';
            }
        }
    }
    //delete product
    if(isset($_POST['delete'])){
        $p_id = $_POST['product_id'];
        $p_id = filter_var($p_id,FILTER_SANITIZE_STRING);

        $delete_image = $conn->prepare("select * from `products` where id = ?");
        $delete_image->execute(['$p_id']);
        $fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);
        if($fetch_delete_image['image'] != ''){
            unlink('img/'.$fetch_delete_image['image']);
        }

        $delete_product = $conn->prepare("delete from `products` where id = ?");
        $delete_product->execute([$p_id]);

        header('location: admin_view_product.php');
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

    
    <title>GREEN COFFEE admin panel - edit product page</title>
</head>
<body>
    <?php include 'admin_header.php'; ?>
    <div class = "main">
        <div class = "banner">
            <h1>edit products</h1>
        </div>
        <div class = "title2">
            <a href="dashboard.php">dashboard</a><span> / edit products</span>
        </div>
        <section class = "edit-post">
            <h1 class = "heading">edit product</h1>
            <?php
                $post_id = $_GET['id'];
                $select_product = $conn->prepare("select * from `products` where id = ?");
                $select_product->execute([$post_id]);

                if($select_product->rowCount() > 0){
                    while($fetch_product = $select_product->fetch(PDO::FETCH_ASSOC)){
                       
            ?>
            <div class = "form-container">
                <form action="" method = "post" enctype = "multipart/form-data">
                    <input type="hidden" name ="old_image" value="<?=$fetch_product['image']; ?>">
                    <input type="hidden" name ="product_id" value="<?=$fetch_product['id']; ?>">
                    <div class = "input-field">
                        <label for="">update status</label>
                        <select name="status" id="">
                            <option selected disabled value ="<?= $fetch_product['status']; ?>"><?= $fetch_product['status'] ?></option>
                            <option value="active">active</option>
                            <option value="deactive">deactive</option>
                        </select>
                    </div>
                    <div class = "input-field">
                        <label for="">product name</label>
                        <input type="text" name = "name" value="<?=$fetch_product['name']; ?>">

                    </div>
                    <div class = "input-field">
                        <label for="">product price</label>
                        <input type="number" name = "price" value="<?=$fetch_product['price']; ?>">
                        
                    </div>
                    <div class = "input-field">
                        <label for="">product description</label>
                        <textarea name="content"><?=$fetch_product['product_detail']; ?></textarea>
                    </div>
                    <div class = "input-field">
                        <label for="">product image</label>
                        <input type="file" name ="image" accept = "img/*">
                        <img src="img/<?=$fetch_product['image']; ?>">
                        
                    </div>
                    <div class = "input-field">
                        <button type = "submit" name = "update" class="btn">update product</button>
                        <a href="admin_view_product.php" class= "btn">go back</a>
                        <button type = "submit" name = "delete" class="btn">delete product</button>

                    </div>
                </form>
            </div>
            <?php
                        }
                    }else{
                        echo '<div class = "empty">
                                <p>no product added yet! <br> <a href="add_products.php" style ="margin-top: 1.5rem;" class = "btn">add product</a></p>
                            </div>';
                    }
                ?>
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