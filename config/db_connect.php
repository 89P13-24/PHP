<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ninja_pizza";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    echo 'Connection error:- ' . mysqli_connect_error();
}

?>