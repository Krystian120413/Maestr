<?php
    include 'databaseconnect.php';
    
    $email = $_POST['email'];
    $password = $_POST['passwd'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];

    $query = "SELECT email FROM users where email = '".$email."'";
    $result = mysqli_query($connection, $query);

    if(!is_null($result)) {
        $qry = "SELECT email FROM admins where email = '".$email."'";
        $res = mysqli_query($connection, $qry);

        if(is_null($res)){
            echo '<script>alert("błędne dane")</script>';
            header("refresh:1; index.html");
        }
        else {
            $qr = "INSERT INTO users VALUES('".$email."', '".$password."', '".$name."', '".$surname."')";
            $re = mysqli_query($connection, $qr);
            if($re){
                echo '<script>alert("Pomyślnie utworzono konto. Teraz możesz się zalogować")</script>';
                header("refresh:1; index.html");
            }
            else {
                echo '<script>alert("Błąd bazy danych")</script>';
                header("refresh:1; index.html");
            }
        }
    }
    else {
        echo '<script>alert("Konto o tym emailu już istnieje w bazie")</script>';
        header("refresh:1; index.html"); 
    }
?>