<?php
include("./classes.php");

    $register1 = new register();
    $register1->first_name = $_POST["first_name"];
    $register1->infix = $_POST["infix"];
    $register1->last_name = $_POST["last_name"];
    $register1->email = $_POST["email"];
    $register1->username = $_POST["username"];
    // $id = sanitize($_POST["id"]);
    // $pwh = sanitize($_POST["pwh"]);
    // $password = sanitize($_POST["password"]);
    // $passwordcheck = sanitize($_POST["password-check"]);

    if (empty($_POST["password"]) || empty($_POST["password-check"])) {
        header("location: ./index.php?content=message&alert=password-empty&id=$id&pwh=$pwh");
        }
    elseif (strcmp($password, $passwordcheck)) {
        header("location: ./index.php?content=message&alert=passwords-unmatched&id=$id&pwh=$pwh");
    }
    else {
        $sql = "SELECT * FROM `users` WHERE `id` = $id and `password` = '$pwh'";

        $result = mysqli_query($conn , $sql);
        if (mysqli_num_rows($result))
        {
        // update
        // .1 pasword hash
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
        // .2 update script
        $sql = "UPDATE `users` 
                SET `password` = '$password_hash'
                WHERE `id` = $id
                and `password` = '$pwh'";
            if (mysqli_query($conn , $sql)){
            // .3 feedback for user
            header("location: ./index.php?content=message&alert=succesfull-activation");
            }
            else {
            // error
            header("location: ./index.php?content=message&alert=update-error&id=$id&pwh=$pwh");
            }
        }
        else
        {
        // error
        header("location: ./index.php?content=message&alert=no-id-pwh-match&id=$id&pwh=$pwh");
        }
    
    }
    ?>