<?php
    session_start();
    
    include 'databaseconnect.php';
    
    $ciastka = $_COOKIE['ciastka'];
    $ciastka = stripslashes($ciastka);
    $ciastka = unserialize($ciastka);

    $email = $ciastka['email'];
    $songId = $_POST['songId'];

    $query = "INSERT INTO usersongs(`user_email`, `song_id`) VALUES('".$email."', '".$songId."');";
    mysqli_query($connection, $query);

    session_write_close();
?>