<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="style_d.css" />
    <title>MEASTR</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
            <img src="img/logo_maestr.png" alt="maestr" class="image d-inline-block align-bottom"/>
            <div class="d-inline-block align-bottom baner">MAESTR</div>
            <buttton class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#hambmenu" aria-controls="hambmenu" aria-expanded="false" aria-label="Navigation button">
                <span class="navbar-toggler-icon"></span>
            </buttton>
            <div class="collapse navbar-collapse justify-content-end"  style="z-index: 10;" id="hambmenu">
            <div class="navbar-nav">
                    <?php
                        if(isset($_SESSION['Authenticated']) && ($_SESSION['Authenticated'] == 1)){
                    ?>
                        <select name="userAction" id="userAction" class="nav-link login" onchange="location = this.value;">
                        <option value="newMusic.php">Odkrywaj nowe utwory</option>
                        <option value="userSongs.php">Twoje ulubione</option>
                        <option value="changeData.php" selected>Zmień swoje dane</option>
                        </select>        
                        <hr/>
                        <a class="nav-link login" id="logout" href="login.php?logout">Wyloguj się</a>
                    <?php
                        }
                    ?>   
                    <hr/>
                </div>
            </div>
        </nav>
    <div class="main">
        <div class="container">
            <?php
                if(isset($_SESSION['Authenticated']) && ($_SESSION['Authenticated'] == 1)){
            ?>
            <div class="row">
                
            </div>
            <?php
                }
            ?>
        </div>
    </div>
    <?php
        session_write_close();
    ?>
    <script src="userScript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>