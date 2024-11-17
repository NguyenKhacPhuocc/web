<?php
include 'connect.php';

session_start();
if(isset($_SESSION['user_id'])){
     $user_id = $_SESSION['user_id'];
}else{
    $user_id='';
}
// register user
 if(isset($_POST['submit'])){
    $id = unique_id();
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email= $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass= $_POST['pass'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $cpass= $_POST['cpass'];
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $select_user->execute([$email]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if($select_user->rowCount()>0){
        $message[] = 'email already exist';
        echo 'email already exist';
    }else{
        if($pass != $cpass){
            $message[]='confirm your password';
            echo 'confirm your password';
        }else{
            $insert_user = $conn->prepare("insert into `users` (id,name,email,password) values(?,?,?,?)");
            $insert_user->execute([$id , $name ,$email , $pass]);
            header('location:home.php');
            $select_user = $conn->prepare("select * FROM `users` where email = ? and password = ? ");
            $select_user->execute([$email, $pass]);
            $row = $select_user->fetch(PDO::FETCH_ASSOC);
            if ($select_user->rowCount() > 0){
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name']= $row['name'];
                $_SESSION['user_email'] = $row['email'];
            }
        }
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
    
<link rel="icon" href="img/download.png" type="image/png">
    <title>Green Tea</title>
</head>
<body>
    <div class="form-container">
        <section class = "form-container">
            <div class="title">
                <img class = "logo" src = "img/download.png">
                <h1>register now</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In autem, amet voluptatum rem eum eveniet</p>
            </div>
            <form method="post" action="">
                <div class="input-field">
                    <p>your name <sup>*</sup></p>
                    <input type="text" name="name" required placeholder="enter your name" maxlength="50">                    
                </div>

                <div class="input-field">
                    <p>your email <sup>*</sup></p>
                    <input type="email" name="email" required placeholder="enter your email" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">                    
                </div>

                <div class="input-field">
                    <p>your password <sup>*</sup></p>
                    <input type="password" name="pass" required placeholder="enter your password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">                    
                </div>

                <div class="input-field">
                    <p>confirm password <sup>*</sup></p>
                    <input type="password" name="cpass" required placeholder="enter your password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">                    
                </div>
                <input type="submit" name="submit" value="register now" class="btn" style = "background-color: var(--light-green);">
                 <p>already have an account?<a href="admin_login.php">login now</a></p>
            </form>
        </section>
    </div>

    <script src = "fontend.js" ></script>
</body>

</html>