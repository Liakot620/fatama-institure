<?php
//server connection
require 'db_connect.php';

//input data

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$registration_date = date('Y-m-d h:i:s');

if($password == $confirm_password){ 

$sql = "INSERT INTO users (fullname, email, username, password, registration_date) VALUES ('$fullname', '$email', '$username', md5('$password'), '$registration_date')";

if (mysqli_query($conn, $sql)) {
    header("Location: login.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
else{
    echo "password not matched";
}

?>