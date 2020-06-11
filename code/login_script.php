<?php
session_start();
include("./classes.php");
$login = new login;

$login->username = $login->sanitize($_POST["username"]);
$login->password = $login->sanitize($_POST["password"]);
// $passwordhash = '$2y$10$GGfiAkx2hp8azJepGgzIaOz/VAJNzYjeaBx9d9sYBan5SsruPanKO';
// var_dump( password_verify($login->password, $passwordhash));
if ($login->check_fields()) {
    if ($login->check_if_user_exists()) {
        if (password_verify($login->password, $login->result)) {

            // Als password klopt user = ingelogd  
            echo "succes";
            $_SESSION["username"] = $login->username;
            $_SESSION["password"] = $login->password;
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
