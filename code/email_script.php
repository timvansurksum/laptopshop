<?php

if (empty($_POST["email"])) {
    header("Location: ./index.php?content=message&alert=no-email");
} else {
    include("./connect_db.php");
    include("./sanitize.php");
    $email = sanitize($_POST["email"]);
    $sql = "SELECT * from  `users` WHERE `e-mail` = '{$email}'";
    $result = mysqli_query($conn, $sql);
    var_dump($result);
    // hoeveel records heeft het resultaat van de select query


    if (mysqli_num_rows($result)) {
        header("location: ./index.php?content=message&alert=emailexists");
    } else {
        $ut = time();
        $mut = microtime();

        $time = explode(" ", $mut);

        $onehour = mktime(2, 0 , 0 , 1 , 1 , 1970);

        $t = date("H:i:s D-d-M-Y", ($ut + $onehour));
        $d = date("l d-M-Y", ($ut + $onehour));

        $password = $time[1] * $time[0] * 1000000;
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        // id	first_name	infix	last_name	email	role	username
        $sql = "INSERT INTO `users` (`id`,
                                    `e-mail`,
                                    `password`,
                                    `role`)
                                VALUES (NUll,
                                        '$email',
                                        '$password_hash',
                                        'user')";
        // vuur de query af op de database
        // deze functie haalt het laats gegenerreerde id op uit de database

        $result = mysqli_query($conn, $sql);
        var_dump($result);
        $id = mysqli_insert_id($conn);
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
