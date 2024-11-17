<?php
include 'connect.php';
session_start();
if(isset($_POST['login'])){

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = $_POST['password'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $pass1 = sha1($_POST['password']);
    $pass1 = filter_var($pass1, FILTER_SANITIZE_STRING);


    $select_admin =$conn->prepare("SELECT * FROM `admin` WHERE email = ? AND password = ?");
    $select_admin->execute([$email, $pass1]);

    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? and password = ?");
    $select_user->execute([$email, $pass]);

    if($select_admin->rowCount()>0){
        $fetch_admin_id = $select_admin->fetch((PDO::FETCH_ASSOC));
        $_SESSION['admin_id'] = $fetch_admin_id['id'];
        header('location:dashboard.php');
    }else{
        $row = $select_user->fetch(PDO::FETCH_ASSOC);
        if($select_user->rowCount()>0){
            $fetch_user_id = $select_user->fetch((PDO::FETCH_ASSOC));
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            header('location:home.php');
            exit;
        }else{
            $error_message[] = 'Incorrect email or password';
        }
    }

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
    
    
    <title>GREEN-TEA login</title>
</head>
<body>
    <div class="main">
        <section >
            <div class="form-container" id="admin_login">
            <form method="post" action="" enctype="multipart/form-data">
                 <a href="home.php"><center><img src="img/download.png" alt=""></center></a>
                 <h3>login now</h3>
               
                <div class="input-field">
                    <label>user email <sup>*</sup></label>
                    <input type="email" name="email" required placeholder="enter your email" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">                    
                </div>

                <div class="input-field">
                    <label>user password <sup>*</sup></label>
                    <input type="password" name="password" required placeholder="enter your password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">                    
                </div>

              
                <button type="submit" name="login"  class="btn">login now</button>
                 <p>do not have an account?<a href="register.php">register now</a></p>
            </form>                
            </div>          
        </section>
    </div>

    <!-- sweetalert cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> 
 <!-- sweetalert js link -->
    <script src = "fontend.js" ></script>
     <!-- alert -->
     <?php  include 'alert.php'; ?>
</body>

</html>