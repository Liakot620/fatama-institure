<?php
require 'db_connect.php';

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = md5('$password')";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_num_rows($result);
    if($row == 1){
        echo "login successful";
    }else{
        echo "login failed";
    }
   
}else{
    echo "email and password are required";
}


?>