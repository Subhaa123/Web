<?php
require_once('config.php');

?>
<!DOCTYPE html>
<html><head>
    <title>User Registration|PHP</title>
    <link rel="stylesheet" type="text/css"href="css/bootstrap.min.css">
</head>
<body>
<div>
    <?php 
       if(isset($_POST['create'])){
        $firstname   =$_POST['firstname'];
        $lastname    =$_POST['lastname'];
        $email       =$_POST['email'];
        $phonenumber  =$_POST['phonenumber'];
        $password     =$_POST['password'];
        $sql ="INSERT INTO users(firstname, lastname, email, phonenumber, password) VALUES(?, ?, ? ,?, ?)";
        $stmtinsert =$db->prepare($sql);
        $result =$stmtinsert->execute([$firstname,$lastname,$email,$phonenumber,$password]);
        if($result){
            echo'.';
        }else{
            echo'There were errors while saving data.';
        }

       }
    ?>
</div>
</div>
    
        <form action="registration.php" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                <h1>Registration</h1>
                <p>Fill up the form with correct values</p>
                <hr class="mb-3">
                <label for="firstname"><b>First Name</b></label>
                <input class="form-control" id="firstname" type="text" name="firstname"required>

                <label for="lastname"><b>Last Name </b></label>
                <input  class="form-control"id="lastname" type="text" name="lastname"required>

                <label for="email"><b>email Address</b></label>
                <input class="form-control"id="email" type="email" name="email"required>

                <label for="Phone number"><b>phoneNumber</b></label>
                <input class="form-control"id="phonenumber" type="text" name="phonenumber"required>

                <label for="password"><b>Password </b></label>
                <input class="form-control"id="password" type="password" name="password"required>
                <hr class="mb-3">

                <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
    
            </div>
    </div>
</div>
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(function(){
        $('#register').click(function(){
            var valid =this.form.checkValidity();
            if(valid){
                e.preventDefault();
                alert('true');
            }
            else{
                alert('false');
            }
            var firstname   =$('#firstname').val();
            var lastname    =$('#lasstname').val();
            var email       =$('#email').val();
            var phonenumber =$('#phonenumber').val();
            var password    =$('#password').val();
        });
        Swal.fire({
            'title' :'Successful',
            'text'  :'Successfully registered.',
            'type'  :'success'
        })
    });
        
    

    </script>
</body>
</html>