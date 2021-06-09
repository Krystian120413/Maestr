<?php
    session_start();

    include 'databaseconnect.php';
                    
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
        
    $query = "SELECT count(email) FROM users where email = '".$email."' and passwd = '".$passwd."'";
    $result_set = mysqli_query($connection, $query);

    if($result_set){
        $row = mysqli_fetch_assoc($result_set);
        $value = $row['count(email)'];
    }
    else $value = 0;

    if($value >= 0){
        // zapis
        $ciastka = Array('email' => $email);
        setcookie('ciastka', serialize($ciastka), time()+3600);

        // odczyt zabezpieczony przed nieistniejącym ciasteczkiem
        if (isset($_COOKIE['ciastka'])) $tablica = unserialize($_COOKIE['ciastka']); 
        else $ciastka = Array();

        if($value == 0){
            session_write_close();
            header('Location: adminLogin.php');
        }
        else{
            $_SESSION['Authenticated'] = 1;
            session_write_close();
            
            header('Location: newMusic.php');
        }
    }
    else if(isset($_GET['logout'])){
        session_destroy();
        header('Location: index.html');
        setcookie('ciastka', '', time() - 3600);
        mysqli_close($connection);
    }
    else {
        session_destroy();
        header('Location: index.html');
    }
?>