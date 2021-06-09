<?php
    $connection = mysqli_connect ('localhost', 'root', '') or die('Not connected : Its bad ' . mysqli_connect_error());
    mysqli_select_db($connection, 'maestrdb');
?>