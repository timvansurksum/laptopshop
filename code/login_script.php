<?php
include("./classes.php");
$register = new register;
var_dump($_POST);
echo "1";
if (isset($_POST['username']) && isset($_POST['password'])) {

echo "2";
    
    // Query password WHERE username = $_POST['username']
    $sql = "SELECT `password` FROM `users` WHERE `username` = '{$_POST['username']}'";
    $result = mysqli_query($register->conn, $sql);
    if (mysqli_num_rows($result)) {
        if () {
    // Password uit db vergelijken met form password
    // zie password verify
    // Als password klopt user = ingelogd     
    }
    else {
    //anders error
    // header("location: ./index.php?content=message&alert=incorrect-password");
    }
    echo 'success';
    }
    else {
echo "fail";
    // als gebruiker niet bestaat = error
    // header("location: ./index.php?content=message&alert=no-user");
    }

}
