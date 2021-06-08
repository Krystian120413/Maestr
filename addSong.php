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
        .registerInput {
            font-size: 1em;
        }
        button {
            font-size: 1em !important;
            margin-top: 30px !important;
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
                    <hr/>
                    <?php
                        if(isset($_SESSION['Authenticated']) && ($_SESSION['Authenticated'] == 1)){
                    ?>
                            <select name="userAction" id="userAction" class="nav-link login" onchange="location = this.value;">
                                <option value="adminPanel.php">Wszystkie utwory</option>
                                <option value="addSong.php" selected>Dodaj nowe utwory</option>
                                <option value="seeUsers.php">Zobacz użytkowników</option>
                            </select>        
                            <hr/>
                            <a class="nav-link login" id="logout" href="login.php?logout">Wyloguj się</a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </nav>
    <div class="main">
        <div class="container">
            <div class="row">
                <?php
                    if(isset($_SESSION['Authenticated']) && ($_SESSION['Authenticated'] == 1)){
                ?>
                        <div class="row">
                            <h1 class="col-md-12 hhh" style="margin:40px 0 60px 0;">Dodaj nowy utwór</h1>
                            <form method="post" action="addNewSong.php" enctype= multipart/form-data>
                                <div class="form-group row">
                                    <label for="title" class="offset-md-1 col-md-3">Tytuł:</label>
                                    <span class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">keyboard</i>
                                                </span>
                                            </div>
                                            <input type="text" name="title" class="form-control registerInput" required>
                                        </div>
                                    </span>
                                </div>

                                <div class="form-group row">
                                    <label for="author" class="offset-md-1 col-md-3">Autor:</label>
                                    <span class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">keyboard</i>
                                                </span>
                                            </div>
                                            <input type="text" name="author" class="form-control registerInput" required>
                                        </div>
                                    </span>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="audioFile" class="offset-md-1 col-md-3">Dodaj plik audio:</label>
                                    <span class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">person</i>
                                                </span>
                                            </div>
                                            <input type="file" name="audioFile" class="form-control registerInput" accept="audio/*" required>
                                        </div>
                                    </span>
                                </div>

                                <div class="form-group row">
                                    <label for="poster" class="offset-md-1 col-md-3">Dodaj okładkę:</label>
                                    <span class="col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">person</i>
                                                </span>
                                            </div>
                                            <input type="file" name="poster" class="form-control registerInput" accept="image/*" required>
                                        </div>
                                    </span>
                                </div>
                                
                                <div class="form-group row">
                                    <button type="submit" class="btn btn-danger offset-md-4 col-md-2" name="save_audio">Dodaj</button>
                                </div>
                            </form>
            <?php
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