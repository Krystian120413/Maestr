<?php
session_start();
    if(isset($_SESSION['Authenticated']) && ($_SESSION['Authenticated'] == 1)){
        $ciastka = $_COOKIE['ciastka'];
        $ciastka = stripslashes($ciastka);
        $ciastka = unserialize($ciastka);

        if(!(is_null($_POST['name']))){
                        
            include 'databaseconnect.php';
                        
            $email = $ciastka['email'];
            $name = $_POST['name'];
           
            if($name != ""){
                $query = "UPDATE users SET `name` = '".$name."'";
                $result = mysqli_query($connection, $query);
            }
            else $result = false;
            if($result){
                header("refresh:1; userPanel.php");
                echo "<script>alert('Pomyślnie zmieniono Twoje dane.')</script>";
                session_write_close();
            }
            else {
                header("refresh:1; changeData.php");
                echo "<script>alert('Błąd bazy danych.')</script>";
            }
        }
        else {
            header("refresh:0.1; changeData.php");
            echo "<script>alert('Nic nie wpisano.')</script>";      
        }
        if(!(is_null($_POST['surname']))){
             include 'databaseconnect.php';           

            $email = $ciastka['email'];
            $surname = $_POST['surname'];

            if($name != ""){    
                $qr = "UPDATE users SET `surname` = '".$surname."'";
                $result = mysqli_query($connection, $qr);
            }
            else $result = "";
            if($result){
                header("refresh:0.1; changeData.php");
                echo "<script>alert('Pomyślnie zmieniono Twoje dane.')</script>";
                session_write_close();
            }
            else {
                header("refresh:0.1; changeData.php");
                echo "<script>alert('Błąd bazy danych.')</script>";
            }
        }
        else {
            header("refresh:0.1; changeData.php");
            echo "<script>alert('Nic nie wpisano.')</script>";      
        }
        session_write_close();
    }
?>   