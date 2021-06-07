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
                    <hr/>
                    <?php
                        if(isset($_SESSION['Authenticated']) && ($_SESSION['Authenticated'] == 1)){
                    ?>
                            <select name="userAction" id="userAction" class="nav-link login" onchange="location = this.value;">
                                <option value="newMusic.php">Odkrywaj nowe utwory</option>
                                <option value="userSongs.php" selected>Twoje ulubione</option>
                                <option value="changeData.php">Zmień swoje dane</option>
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
                    <div class="col-md-12">
                        <h3>Twoje ulubione utwory</h3>
                    </div>
                    <?php
                        $ciastka = $_COOKIE['ciastka'];
                        $ciastka = stripslashes($ciastka);
                        $ciastka = unserialize($ciastka);

                        $email = $ciastka['email'];

                        include 'databaseconnect.php';
                        $query = "SELECT songs.id, songs.title, songs.author, songs.source, songs.poster_source 
                        FROM songs 
                        inner join usersongs 
                        on usersongs.song_id = songs.id 
                        where usersongs.user_email = '".$email."'";
                        $result_set = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($result_set)){
                    ?>
                            <div class="col-md-3 cover">
                                <?php
                                    echo "<img src='".$row['poster_source']."' class='album-poster poster-img' alt='cover' id='".$row['id']."'>";
                                    echo "<div id='musicSrc".$row['id']."' style='display:none;'>".$row['source']."</div>";
                                ?>
                                <?php
                                    echo "<h4 id='title".$row['id']."'>".$row['title']."</h4>";
                                    echo "<p id='p".$row['id']."'>".$row['author']."</p>";
                                ?>
                            </div>
                <?php
                        }
                    }
                ?>
            </div>
            <div class="row"></div>
        </div>
    </div>
    <?php
        session_write_close();
    ?>
    <footer class="fixed-bottom" id="footer">
        <div class="container pb-0">
            <section>
                <div class="buttons col-md-12">
                    <button class="btn m-1" id="shuffleBtn"><span class="material-icons icon" id="shuffleIcon">shuffle</span></button>
                    <button class="btn m-1" id="previousBtn"><span class="material-icons icon">skip_previous</span></button>
                    <button class="btn m-1" id="playBtn"><span class="material-icons icon" id="playIcon">pause_circle_filled</span></button>
                    <button class="btn m-1" id="nextBtn"><span class="material-icons icon">skip_next</span></button>
                    <button class="btn m-1" id="replayBtn"><span class="material-icons icon" id="replayIcon">replay</span></button>
                </div>
            </section>
            <section class="row" style="min-height: 30px!important;">
                <img id="miniPoster" class="col-md-1">
                <div class="col-md-2" style="max-height:50px;">
                    <h5 id="title"></h5>
                    <p id="author"></p>
                </div>
                <div class="col-md-1">
                    <span class="material-icons icon" id="addIcon">remove_circle</span>
                </div>
                <div class="timer col-md-5">
                    <span id="songTime">00:00</span>
                    <input type="range" id="seekSlider" min="0" value="0" step="0.01">
                    <span id="fullSongTime">00:00</span>
                </div>
                <div class="volume col-md-2">
                    <span class="material-icons icon volumeIcon" id="volumeIcon">volume_up</span>
                    <input type="range" class="slider" value="40"  id="volumeSlider" min="0" max="100">
                </div>
            </section>
        </div>
        
    </footer>
    <script src="userScript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>