<?php
session_start();
    if(isset($_SESSION['Authenticated']) && ($_SESSION['Authenticated'] == 1)){
        $ciastka = $_COOKIE['ciastka'];
        $ciastka = stripslashes($ciastka);
        $ciastka = unserialize($ciastka);

        if(($_POST['password'] == $_POST['secondPassword'] && ($ciastka['passwd'] == $_POST['oldPassword']))){
            
            include 'databaseconnect.php';

            $email = $ciastka['email'];
            $passwd = $_POST['password'];

                        
            $query = "UPDATE users set passwd = '".$passwd."' where email = '".$email."' and passwd = '".$_POST['oldPassword']."';";
            $result_set = mysqli_query($connection, $query);

            if($result_set){
                header("refresh:1; userPanel.php");
                echo "<script>alert('Pomyślnie zmieniono Twoje hasło.')</script>";
                session_write_close();
            }
            else {
                header("refresh:1; changeData.php");
                echo "<script>alert('Błąd bazy danych. Wprowadź hasło poprawnie.')</script>";
            }
        }
        else {
            header("refresh:1; changeData.php");
            echo "<script>alert('Hasła nie są identyczne, lub podano błędne stare hasło')</script>";      
        }
    }
?>   