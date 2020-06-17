<?php
session_start();
include("./classes.php");
$login = new login;

$login->username = $login->sanitize($_POST["username"]);
$login->password = $login->sanitize($_POST["password"]);


if ($login->check_fields()) {
    if ($login->check_if_user_exists()) {
        if (password_verify($login->password, $login->result)) {

            // Als password klopt user = ingelogd  
            $_SESSION["username"] = $login->username;
            echo $_SESSION["username"];
            $_SESSION["password"] = $login->password;
            echo $_SESSION["password"];
            header("location; ./index.php?content=home");
        } else {
            //otherwise error false password
            header("location: ./index.php?content=message&alert=incorrect-password");
        }
    } else {
        // if user doesnt exist = error
        header("location: ./index.php?content=message&alert=no-user");
    }

}
else {
        header("location: ./index.php?content=message&alert=field-empty&page=login");
}
