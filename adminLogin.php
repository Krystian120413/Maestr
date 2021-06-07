<?php
    session_start();

    include 'databaseconnect.php';

    $ciastka = $_COOKIE['ciastka'];
    $ciastka = stripslashes($ciastka);
    $ciastka = unserialize($ciastka);

                    
    $email = $ciastka['email'];
    $passwd = $ciastka['passwd'];
        
    $query = "SELECT count(email) FROM admins where email = '".$email."' and passwd = '".$passwd."'";
    $result_set = mysqli_query($connection, $query);

    if($result_set){
        $row = mysqli_fetch_assoc($result_set);
        $value = $row['count(email)'];
    }
    else $value = 0;

    if($value > 0){
        $_SESSION['Authenticated'] = 1;
        session_write_close();
        
        header('Location: adminPanel.php');
    }
    else if(isset($_GET['logout'])){
        session_destroy();
        setcookie('ciastka', '', time() - 3600);
        header('Location: index_d.html'); 
    }
    else {
        session_destroy();
        setcookie('ciastka', '', time() - 3600);
        header('Location: index_d.html');
    }
?>