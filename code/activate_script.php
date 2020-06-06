<?php

include("./classes.php");

 
    $register2 = new register();
    $register2->id = $register->sanitize($_POST["id"]);
    $register2->password = $register->sanitize($_POST["pwh"]);
    $register2->password = $register->sanitize($_POST["password"]);
    $register2->password_check = $register->sanitize($_POST["password-check"]);

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