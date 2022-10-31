<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

*{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
}

.container{
   min-height: 100vh;
   background-color: #eee;
   display: flex;
   align-items: center;
   justify-content: center;
   text-align: center;
   padding-bottom: 80px;
}

.container .content{
   width: 700px;
}

.container .content h3{
   text-transform: uppercase;
   font-size: 5vw;
}

.container .content p{
   font-size: 20px;
   padding:10px 0;
}

.container .content p span{
   color:crimson;
}

.container .content .logout{
   display: inline-block;
   padding:10px 35px;
   font-size: 20px;
   margin-top: 10px;
   background-color: #000;
   color:#fff;
}

.container .content .logout:hover{
   background-color: crimson;
}

.form-container{
   min-height: 100vh;
   background-color: #eee;
   display: flex;
   align-items: center;
   justify-content: center;
   text-align: center;
   padding-bottom: 80px;
}

.form-container form{
   width: 500px;
   background-color: #fff;
   border:2px solid #000;
   padding:20px;
   text-align: center;
}

.form-container form .title{
   font-size: 25px;
   text-transform: uppercase;
   margin-bottom: 10px;
}


.form-container form .box{
   width: 100%;
   padding:12px 14px;
   font-size: 20px;
   text-transform: none;
   border:2px solid #000;
   margin:10px 0;
}

.form-container form .form-btn{
   display: block;
   width: 100%;
   font-size: 20px;
   padding:10px;
   background-color: #000;
   color:#fff;
   cursor: pointer;
   margin:10px 0;
}

.form-container form .form-btn:hover{
   background-color: crimson;
}

.form-container form p{
   font-size: 20px;
   margin-top: 20px;
}

.form-container form p a{
    color:crimson;
}

.form-container form .error-msg{
   display: block;
   width: 100%;
   padding:10px 0;
   margin:10px 0;
   background-color: crimson;
   font-size: 20px;
   color:#fff;
}
    </style>
</head>

<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    
   $email = mysqli_real_escape_string($conn, $_POST['usermail']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'user already exist';
   }else{
      if($pass != $cpass){
         $error[] = 'password not mathched!';
      }else{
         $insert = "INSERT INTO user_form(email, password) VALUES('$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
<div class="form-container">

   <form action="" method="post">
      <h3 class="title">register now</h3>
      <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
      <input type="email" name="usermail" placeholder="enter your email" class="box" required>
      <input type="password" name="password" placeholder="enter your password" class="box" required>
      <input type="password" name="cpassword" placeholder="confirm your password" class="box" required>
      <input type="submit" value="register now" class="form-btn" name="submit">
      <p>already have an account? <a href="login_form.php">login now!</a></p>
   </form>

</div>

</body>
</html>