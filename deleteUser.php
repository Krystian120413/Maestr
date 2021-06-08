<?php
    session_start();
    
    include 'databaseconnect.php';
    
    $ciastka = $_COOKIE['ciastka'];
    $ciastka = stripslashes($ciastka);
    $ciastka = unserialize($ciastka);

    $row = $_POST['row'];
    
    $query = "DELETE from users WHERE email = '".$row."'";
    $result = mysqli_query($connection, $query);        


    if($result){      
        header("refresh:1; seeUsers.php");
        echo "<script>alert('Pomyślnie usunięto użytkownika.')</script>"; 
    }

    else {
        header("refresh:1; seeUsers.php");
        echo "<script>alert('Błąd bazy danych.')</script>";
    }
?>