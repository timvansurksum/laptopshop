<?php

    // gets all the $_get variables and puts them in their corresponding variables
$alert = (isset($_GET["alert"])) ? $_GET["alert"] : "default";
$id = (isset($_GET["id"])) ? $_GET["id"] : "";
$pwh = (isset($_GET["pwh"])) ? $_GET["pwh"] : "";
$username = (isset($_GET["username"])) ? $_GET["username"] : "";

    // sets a default value for the refresh time and page for the redirection
$time = 3;
$page = "register";
    // all the indavidual alerts
switch ($_GET["alert"]) {
    case 'no-email':
        echo '<div class="alert mx-auto mt-5 alert-info" role="alert ">
        No email filled in
        <hr>
        Please fill in an email
        </div>';
        break;
        case 'no-username':
            echo '<div class="alert mx-auto mt-5 alert-info" role="alert ">
            No username filled in
            <hr>
            Please fill in an username
            </div>';
            break;
    case 'emailexists':
        echo '<div class="alert mx-auto mt-5 alert-danger" role="alert ">
        We already have this email 
        <hr>
        try another one
        </div>';
        break;
        case 'username-exists':
            echo '<div class="alert mx-auto mt-5 alert-danger" role="alert ">
            We already have a user with the username ' . $username . '
            <hr>
            try another one
            </div>';
            break;
    case 'insert-mail-error';
        echo '<div class="primairy mx-auto mt-5 alert-danger" role="alert ">
        registration failed
        <hr>
        please re-try
        </div>';
        break;
    case 'succes';
        $time = 6;
        $page = "home";
        echo '<div class="primairy mx-auto mt-5 alert-danger" role="alert ">
        you succesfully registerd for on our website. soon you will recieve an e-mail with an activation-mail
        <hr>
        </div>';
        break;
    case 'password-empty';
        $time = 3;
        $page = "activate&id=$id&pwh=$pwh";
        echo '<div class="primairy mx-auto mt-5 alert-warning" role="alert ">
        one or both fields were left empty
        <hr>
        please re-try
        </div>';
        break;
    case 'hacker-alert';
        $time = 3;
        $page = "home";
        echo '<div class="primairy mx-auto mt-5 alert-danger" role="alert ">
        you dont have rights on this page
        <hr>
        </div>';
        exit;
        break;
    case 'passwords-unmatched';
        $time = 3;
        $page = "activate&id=$id&pwh=$pwh";
        echo '<div class="primairy mx-auto mt-5 alert-warning" role="alert ">
        the passwords you entered dont match
        <hr>
        please try again
        </div>';
        break;
    case 'no-id-pwh-match';
        $time = 3;
        $page = "register";
        echo '<div class="primairy mx-auto mt-5 alert-warning" role="alert ">
        u are not registered in our database please register on our register page
        <hr>
        </div>';
        break;
        case 'succesfull-activation';
        $time = 6;
        $page = "login";
        echo '<div class="primairy mx-auto mt-5 alert-danger" role="alert ">
        Welcome to our website!!
        <hr>
        you succesfully activated your e-mail. now you can log into our website
        </div>';
        break;
        case 'update-error';
        $time = 3;
        $page = "activate&id=$id&pwh=$pwh";
        echo '<div class="primairy mx-auto mt-5 alert-danger" role="alert ">
        the registration failed
        <hr>
        please try again
        </div>';
        break;
    default:
            // goes to the standard refresh page "home.php"
        header("location: ./index.php?content=home");
        break;
}
    // refreshes to a new page
header("Refresh: $time; url=./index.php?content=$page");
