<?php

include("./classes.php");

 
    $register2 = new activate();
    $register2->id = $_POST["id"];
    $register2->pwh = $_POST["pwh"];
    $register2->password = $_POST["password"];
    $register2->password_check = $_POST["password-check"];
    
    $id = $register2->sanitize($register2->id);
    $pwh = $register2->sanitize($register2->pwh);

    if (empty($_POST["password"]) || empty($_POST["password-check"])) {
        header("location: ./index.php?content=message&alert=password-empty&id=$id&pwh=$pwh");
        }
    elseif (strcmp($register2->password, $register2->password_check)) {
        header("location: ./index.php?content=message&alert=passwords-unmatched&id=$id&pwh=$pwh");
    }
    else {
        $sql = "SELECT * FROM `users` WHERE `id` = '$id' and `password` = '$pwh'";

        $result = mysqli_query($register2->conn , $sql);
        if (mysqli_num_rows($result))
        {
        // update
        // .1 pasword hash
            $password_hash = $register2->hash_password();
        // .2 update script
        $sql = "UPDATE `users` 
                SET `password` = '$password_hash'
                WHERE `id` = $id
                and `password` = '$pwh'";

            if (mysqli_query($register2->conn , $sql)){
            // .3 feedback for user
            header("location: ./index.php?content=message&alert=succesfull-activation&id=$id&pwh=$pwh");
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