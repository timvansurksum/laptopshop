<?php
session_start();
include("./classes.php");
$check = new login;
$check->username = $check->sanitize($_SESSION["username"]);
$check->password = $check->sanitize($_SESSION["password"]);

if ($check->check_fields()){

    if ($check->check_session()){
        $check->check_role();
        echo $check->role;
    }
    else
    {
        // header("location: ./index.php?content=message&alert=no-login&page=login");
    }
}
else {
        // header("location: ./index.php?content=message&alert=no-login&page=login");
}
?>