<?php
    session_start();

    $title = $_POST['title'];
    $author = $_POST['author'];

    $songDir = 'music/songs/';
    $songPath = $songDir.basename($_FILES['audioFile']['name']);

    $posterDir = 'music/posters/';
    $posterPath = $posterDir.basename($_FILES['poster']['name']);

    if(move_uploaded_file($_FILES['audioFile']['tmp_name'], $songPath) && move_uploaded_file($_FILES['poster']['tmp_name'], $posterPath)){
        saveAudio($songPath, $posterPath);
    }
    else {
        echo "<script>alert('Wystąpił błąd, proszę spróbować ponownie')</script>";
        header("refresh:1; addSong.php");
        session_write_close();
    }

    function saveAudio($audioFileName, $posterFileName){
        include 'databaseconnect.php';
        global $title, $author;

        $query = "INSERT INTO songs(title, author, source, poster_source) VALUES('{$title}', '{$author}', '{$audioFileName}', '{$posterFileName}')";
        mysqli_query($connection, $query);

        if(mysqli_affected_rows($connection) > 0){
            echo "<script>alert('Pomyślnie dodano nowy utwór')</script>";
            session_write_close();
            header("refresh:1; adminPanel.php");
        }
        else {
            echo "<script>alert('Wystąpił błąd w połączeniu z bazą danych, proszę spróbować ponownie')</script>";
            header("refresh:1; addSong.php");
            session_write_close();
        }
    }   
?>