<?php
    include("classes.php");
    // include("./sanitize.php");

if (empty($_POST["email"])) {
    header("Location: ./index.php?content=message&alert=no-email");
} else {

    $register->check_for_registration($_POST['email'], $_POST["username"]);
    if ($result_email)


    if (mysqli_num_rows($result)) {
        header("location: ./index.php?content=message&alert=emailexists");
    } else {

        if ($result) {
            $to = $email;
            $message = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
            <div style="color: rgb(0, 255, 0)">
            <b>
                <h1>dear user</h1>
                </b>
                <div style="color: rgb(0, 0, 0)">
                    <p>' . $d . '</p>
                    <p>You have succesfully signed up for our website.</p>
                    <p>Click here to activate your email</p>
                    <a href="http://afasie.tv//index.php?content=activate&pwh=' . $password_hash . '&id=' . $id . '">activate</a>
                </div>
            </div>
            </body>
            </html>';
            $subject = "activation link";
            $headers = "MIME-Version: 1.0\r\n"; 
            $headers .= "Content-type: text/html; charset=UTF-8\r\n";
            $headers .= "From: t.v.surksum@afasie.tv\r\n";
            $headers .= "Cc: \r\n";
            $headers .= "Bcc: ";
            $parameters = '';
            mail($to, $subject, $message, $headers);
            header("location: ./index.php?content=message&alert=succes");
        } else {
            header("location: ./index.php?content=message&alert=insert-mail-error");
        }
    }
}
