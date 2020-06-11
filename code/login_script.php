<?php
session_start();

include("./classes.php");
$register = new register;


$username = $register->sanitize($_POST["username"]);
$password = $register->sanitize($_POST["password"]);

if (isset($username) && isset($password)) {
    
    // Query password WHERE username = $username
    $sql = "SELECT `password` FROM `users` WHERE `username` = '{$username}'";
    $result = mysqli_query($register->conn, $sql);
    // Password uit db vergelijken met form password    
    if (mysqli_num_rows($result)) {
        if (password_verify($_POST["password"] , $result)) {
    // Als password klopt user = ingelogd  
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
    header("location; ./index.php?content=home");
    }
    else {
    //otherwise error false password
    header("location: ./index.php?content=message&alert=incorrect-password");
    }
    
    }
    else {
    
    // if user doesnt exist = error
    header("location: ./index.php?content=message&alert=no-user");
    }

}
