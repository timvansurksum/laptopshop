<?php

include("./classes.php");

 
    $activate = new activate();
    $activate->id = $_POST["id"];
    $activate->pwh = $_POST["pwh"];
    $activate->password = $_POST["password"];
    $activate->password_check = $_POST["password-check"];
    
    $id = $activate->sanitize($activate->id);
    $pwh = $activate->sanitize($activate->pwh);

    if ($activate->check_password_fields()) {
        header("location: ./index.php?content=message&alert=password-empty&id=$id&pwh=$pwh");
        }
    elseif (strcmp($activate->password, $activate->password_check)) {
        header("location: ./index.php?content=message&alert=passwords-unmatched&id=$id&pwh=$pwh");
    }
    else {
        if($activate->check_for_user())
        {
        // update password
            if (update_password()){}
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