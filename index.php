<form action="index.php" method="post" >

    username 
    <input type="text" name="username" id="username"><br>
    password
    <input type="text" name="password" id="password"><br> 
    <input type="submit">

</form>
<?php 
$servename="localhost";
$username="root";
$password="";
$dbname="form";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("connection fail");
}
$username=$_POST['username'];
$password=$_POST['password'];
$sql="INSERT INTO `login` (`username`, `password`) VALUES ('$username', '$password')";
if($conn->query($sql)==true){
    echo"new record added";
}
else{
    echo"error";
}
$conn->close();
?>