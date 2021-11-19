<?php
session_start();
$con = mysqli_connect('localhost','root', '');
mysqli_select_db($con, 'melody.duna_db');

$name = $_POST['user'];
$pass = $_POST['password'];

$s = " SELECT * from usertable WHERE name = '$name'"; 

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    echo" Usename Already Taken";
}else{
    $reg= " insert into usertable (name, password) values ('$name','$pass')";
   mysqli_query($con, $reg);
    echo" Registration Successful";
}