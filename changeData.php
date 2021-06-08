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
    <style>
        .row {
            min-height: 40px;
        }
        .container {
            font-size: 2em;
        }
        .material-icons {
            transform: scale(1.8);
            height: 66px;
            width: 66px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        button {
            font-size: 1em !important;
        }
        @media (max-width: 1400px){
            .input-group-prepend {
                display: none;
            }
        }
    </style>
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
            <h1 class="col-md-12 hhh" style="margin:-40px 0 20px 0;">Zmień swoje dane</h1>
            <div class="row">
                <h2 class="hhh">Zmiana hasła:</h2>
            </div>
            <form method="post" action="changePassword.php">
                <div class="form-group row">
                    <label for="password" class="offset-md-2 col-md-2">Wpisz hasło:</label>
                    <span class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">keyboard</i>
                                </span>
                            </div>
                            <input type="password" name="password" class="form-control registerInput" maxlength=70 minlength=6 required>
                        </div>
                    </span>
                 </div>

                <div class="form-group row">
                <label for="secondPassword" class="offset-md-2 col-md-2">Powtórz hasło:</label>
                <span class="col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">keyboard</i>
                            </span>
                        </div>
                        <input type="password" name="secondPassword" class="form-control registerInput" maxlength=70 minlength=6 required>
                    </div>
                </span>
                </div>

                <div class="form-group row">
                    <label for="oldPassword" class="offset-md-2 col-md-2">Wpisz stare hasło:</label>
                    <span class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">person</i>
                                </span>
                            </div>
                            <input type="password" name="oldPassword" class="form-control registerInput" maxlength=70 minlength=6 required>
                        </div>
                    </span>
                </div>

                <div class="form-group row">
                    <button type="submit" class="btn btn-danger offset-md-4 col-md-2">Zmień hasło</button>
                </div>
            </form>

            <div class="row">
                <h2 class="hhh" style="margin-top:20px;">Zmiana danych:</h2>
            </div>
            <?php
                include 'databaseconnect.php';

                $ciastka = $_COOKIE['ciastka'];
                $ciastka = stripslashes($ciastka);
                $ciastka = unserialize($ciastka);

                $email = $ciastka['email'];

                $query = "SELECT `name`, `surname` FROM users where email = '".$email."'";
                $result_set = mysqli_query($connection, $query);
                if($row = mysqli_fetch_assoc($result_set)){
            ?>
            <form method="post" action="changeUserData.php">
                <div class="form-group row">
                    <label for="name" class="offset-md-2 col-md-2">Wpisz imię:</label>
                    <span class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">person</i>
                                </span>
                            </div>
                            <?php
                                echo '<input type="text" name="name" class="form-control registerInput" placeholder='.$row['name'].' maxlength=70>';
                            ?>
                        </div>
                    </span>
                </div>

                <div class="form-group row">
                <label for="surname" class="offset-md-2 col-md-2">Wpisz nazwisko:</label>
                <span class="col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">person</i>
                            </span>
                        </div>
                        <?php
                            echo '<input type="text" name="surname" class="form-control registerInput" placeholder='.$row['surname'].' maxlength=70>';
                        ?>
                    </div>
                </span>
                </div>
                <div class="form-group row">
                    <button type="submit" class="btn btn-danger offset-md-4 col-md-2">Zaktualizuj swoje dane</button>
                </div>
        </form>
    <?php
                }
            session_write_close();
        }
        else {
    ?>
    <div class="row">
        <h1 class="col-md-12 hhh">NIE JESTEŚ ZALOGOWANY</h1>
    </div>
    <?php
            session_destroy();
        }
    ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>