<?php
include("connect_db.php");
class register {
    
    function sanitize($raw_data) {
            global $conn;
            $data = htmlspecialchars($raw_data);
            $data = mysqli_real_escape_string($conn, $data);
            return $data;
    }
    function check_for_registration($first_name, $infix, $last_name, $email, $username){
        include("connect_db.php");
        $clean_email = $this->sanitize($email);
        $clean_first_name = $this->sanitize($email); 
        $clean_infix = $this->sanitize($email);
        $clean_last_name = $this->sanitize($email);
        $clean_username = $this->sanitize($username);
        $sql = "SELECT * from  `users` WHERE `e-mail` = '{$email}'";
        $result_email = mysqli_query($conn, $sql);
        $result_username = mysqli_query($conn, $sql);
    }
    function enter_DB(){
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
                                    `first_name`,
                                    `infix`,
                                    `last_name`,
                                    `email`,
                                    `role`,
                                    `username`)
                                VALUES (NUll,
                                        '$email',
                                        '$password_hash',
                                        'user')";
        // vuur de query af op de database
        // deze functie haalt het laats gegenerreerde id op uit de database

        $result = mysqli_query($conn, $sql);
        var_dump($result);
        $id = mysqli_insert_id($conn);
    }

}
?>