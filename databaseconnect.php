<?php
    $connection = mysqli_connect ('localhost', 'root', '') or die('Not connected : Ah sh*t ' . mysqli_connect_error());
    mysqli_select_db($connection, 'maestrdb');
?>