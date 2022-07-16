<?php
    session_start();
    if(isset($_SESSION["username"])){
        $multipleBtn = <<<EOL
        <a href="logout.php">LOGOUT</a>
        <a><button  id="themeMoon" class="button1" onclick="darkMode()"><i class="fa fa-moon-o" aria-hidden="true"></i></button></a>
        <a href="javascript:void(0);" class="icon" onclick="responsiveNavbar()">
        <i class="fa fa-bars"></i>
        </a>
        EOL ;
    }else{
        $multipleBtn = <<<EOL
        <a href="login.php">LOGIN</a>
        <a href="register.php">REGISTER</a>
        <a><button  id="themeMoon" class="button1" onclick="darkMode()"><i class="fa fa-moon-o" aria-hidden="true"></i></button></a>
        <a href="javascript:void(0);" class="icon" onclick="responsiveNavbar()">
        <i class="fa fa-bars"></i>
        </a>
        EOL ;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_files/layout_styles.css">
    <script src="js/script1.js"></script>
    <link rel="stylesheet" type="text/css" href="css/layout_styles.css?<?=filemtime('css/layout_styles.css');?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>YilmazFlix - Home</title>
</head>

<body>
    <div id="navbar" class="navbar">
        <div class="navbar_left">
            <a href="index.php">
                <img src="img/logo_transparent.png">
            </a>
        </div>
    
        <form class="navbar_mid" action="./action_page.php" method="get">
            <input type="text" id="search" placeholder="Search.." name="search">
            <button id="searchbutton" type="submit"><i class="fa fa-search"></i></button>
        </form>
        <div class="navbar_right">
            <?php echo $multipleBtn; ?>
        </div>
    </div>

    <br>
        
    <div class="topRated">
        <h1 class="header">Top Rated Movies</h1>
            <?php

                $id_movie = urlencode("id");
                $data = file_get_contents("https://api.themoviedb.org/3/movie/top_rated?api_key=59419be18ecb300104521be9c3837f01&language=en-US&page=1");
                $data = json_decode($data,true);
                foreach($data['results'] as $result){

                    echo '<div class="column">
                    <div class="row">
                    <a href="movie.php?id=' . $result['id'] . '"><img src="'."http://image.tmdb.org/t/p/w500".''. $result['poster_path'] . '" width="140" height="180"></a><a><h4>' . $result['original_title']. "</h4></a><h5>"." Rate : " . $result['vote_average'] . " | Vote : " . $result['vote_count'] ."</h5> </h6>"."Popularity : " . round($result['popularity']) . "</h6>
                    </div>
                    </div>";
                    
                }
            ?>

    </div>


    <div class="popular">
        <h1 class="header">Popular Movies</h1>    
            <?php
                $id_movie = urlencode("id");
                $data = file_get_contents("https://api.themoviedb.org/3/movie/popular?api_key=59419be18ecb300104521be9c3837f01&language=en-US&page=1");
                $data = json_decode($data,true);
                foreach($data['results'] as $result){
                    echo '<div class="column">
                    <div class="row">
                    <a href="movie.php?id=' . $result['id'] . '"><img src="'."http://image.tmdb.org/t/p/w500".''. $result['poster_path'] . '" width="140" height="180"></a><h4>' . $result['original_title']. "</h4><h5>"." Rate : " . $result['vote_average'] . " | Vote : " . $result['vote_count'] ."</h5> </h6>"."Popularity : " . round($result['popularity']) . "</h6>
                    </div>
                    </div>";
                    
                }
            ?>

    </div>
    

    <div class="upcoming">
        <h1 class="header">Upcoming Movies</h1>
            <?php

                $id_movie = urlencode("id");
                $data = file_get_contents("https://api.themoviedb.org/3/movie/upcoming?api_key=59419be18ecb300104521be9c3837f01&language=en-US&page=1");
                $data = json_decode($data,true);
                foreach($data['results'] as $result){
                    echo '<div class="column">
                    <div class="row">
                    <a href="movie.php?id=' . $result['id'] . '"><img src="'."http://image.tmdb.org/t/p/w500".''. $result['poster_path'] . '" width="140" height="180"></a><h4>' . $result['original_title']. "</h4><h5>"." Rate : " . $result['vote_average'] . " | Vote : " . $result['vote_count'] ."</h5> </h6>"."Popularity : " . round($result['popularity']) . "</h6>
                    </div>
                    </div>";
                    
                }
            ?>


    </div>


    <script src="js/themeHandler.js"></script>
    <div class="footer">
        <div class="container">Copyright &copy; 2022 Yilmazflix</div>        
    </div>

</body>

</html>