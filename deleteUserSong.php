<?php
    session_start();
    
    include 'databaseconnect.php';

    $ciastka = $_COOKIE['ciastka'];
    $ciastka = stripslashes($ciastka);
    $ciastka = unserialize($ciastka);

    $email = $ciastka['email'];
    $songId = $_POST['songId'];

    $query = "DELETE FROM `usersongs` WHERE song_id = ".$songId." and user_email = '".$email."'";
    mysqli_query($connection, $query);

    session_write_close();
?>