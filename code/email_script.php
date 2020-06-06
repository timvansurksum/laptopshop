<?php
// include("connect_db.php");
include("classes.php");
// include("./sanitize.php");
$register1 = new register();
$register1->first_name = $_POST["first_name"];
$register1->infix = $_POST["infix"];
$register1->last_name = $_POST["last_name"];
$register1->email = $_POST["email"];
$register1->username = $_POST["username"];

if (empty($_POST["email"])) {
    echo 'there is no mail';
    header("Location: ./index.php?content=message&alert=no-email");
} else {
    if ($register1->check_for_registration_email()) {
        header("location: ./index.php?content=message&alert=emailexists");
        echo "mail exists";
    } else {

        if ($register1->check_for_registration_username()) {
            header("location: ./index.php?content=message&alert=username-exists&username=$register1->username");
            echo 'username taken';
        } 
        else {
        echo "send mail";
        $register1->register_confirm();
        }
    }
}
