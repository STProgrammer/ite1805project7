<?php

require_once '../includes.php';

//Denne koden er tatt og litt modifisert fra https://codewithawa.com/posts/check-if-user-already-exists-without-submitting-form

if (isset($_POST['username_check'])) {
    $username = $_POST['username'];
    $stmt = $db->prepare("SELECT count(*) as cntUser FROM Users WHERE username = :username");
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    if($count > 0){
        echo "taken";
    } else {
        echo 'not_taken';
    }
    exit();
}
if (isset($_POST['email_check'])) {
    $email = $_POST['email'];
    $stmt = $db->prepare("SELECT count(*) as cntUser FROM Users WHERE email = :email");
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    if($count > 0) {
        echo "taken";
    } else {
        echo 'not_taken';
    }
    exit();
}


?>