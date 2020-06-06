<?php

class register {
        // all variables you need for useage of the functions
    var $first_name;
    var $infix;
    var $last_name;
    var $email;
    var $username;
    var $conn;
    var $password;

        // updates $conn to make a connection to the database
    function  __construct()
    {
        include("./connect_DB.php");
    }
        // function to secure inputs against attacks by filtering/altering the input
    function sanitize($raw_data) {
            $this->conn;
            $data = htmlspecialchars($raw_data);
            $data = mysqli_real_escape_string($this->conn, $data);
            return $data;
    }
        //  checks if any entered email has already been entered in the users table
    function check_for_registration_email(){
        $clean_email = $this->sanitize($this->email);
        $sql_mail = "SELECT * from  `users` WHERE `email` = '{$clean_email}'";
        $result_mail = mysqli_query($this->conn, $sql_mail);
        return mysqli_num_rows($result_mail); 
        
    }
        //  checks if any entered username has already been entered in the users table
    function check_for_registration_username(){
        $clean_username = $this->sanitize($this->username);       
        $sql_username = "SELECT * from  `users` WHERE `username` = '{$clean_username}'";             
        $result_username = mysqli_query($this->conn, $sql_username);
        return mysqli_num_rows($result_username); 
        
    }
    function hash() {
        return password_hash($this->password, PASSWORD_BCRYPT);
        if (empty($this->password_check)) {
            
        }
        else {
        return password_hash($this->password_check, PASSWORD_BCRYPT);
        }
    }
        // this functions enters user registration data in the users database and then (if it succesfully enters the database) sends a confirmation mail
    function register_confirm(){
            // clean all input info
        $clean_first_name = $this->sanitize($this->first_name); 
        $clean_infix = $this->sanitize($this->infix);
        $clean_last_name = $this->sanitize($this->last_name);        
        $clean_email = $this->sanitize($this->email);
        $clean_username = $this->sanitize($this->username);

            // define time & time formats
        $ut = time();
        $mut = microtime();
        $time = explode(" ", $mut);
        $onehour = mktime(2, 0 , 0 , 1 , 1 , 1970);

        $t = date("H:i:s D-d-M-Y", ($ut + $onehour));
        $d = date("l d-M-Y", ($ut + $onehour));

            // creates password based on time $ hashes the password
        $this->password = $time[1] * $time[0] * 1000000;
        $password_hash = password_hash();


            // defines a input command for SQL with the sanitized user data
        $sql = "INSERT INTO `users` 
            (`id`,
            `first_name`,
            `infix`,
            `last_name`,
            `email`,
            `role`,
            `username`,
            password)
        VALUES (NUll,
            '$clean_first_name',
            '$clean_infix',
            '$clean_last_name',
            '$clean_email',
            'user',
            '$clean_username',
            '$password_hash')";

            // this enters the user info into the users table in the database
        $result = mysqli_query($this->conn, $sql); 

            // this gets the last generated id from the users table
        $id = mysqli_insert_id($this->conn);

                // this checks if the user entry was actually created
            if ($result){

                // if the user data has indeed been entered this will send a confirmation email to the user's mail addres
            $to = $clean_email;
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
                    <a href="http://laptopshop.tv//index.php?content=activate&pwh=' . $password_hash . '&id=' . $id . '">activate</a>
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
            
                // this gives the user a confirmation message to confirm they registered
            header("location: ./index.php?content=message&alert=succes");
        }
        else {

                // this sends a message that the registration failed
            header("location: ./index.php?content=message&alert=insert-mail-error");
        }
    }

}