<?php
    session_start();
    if(isset($_SESSION["username"])){
        $multipleBtn = <<<EOL
        <a href="logout.php">LOGOUT</a>
        <a><button id="themeMoon" class="button1" onclick="darkMode()"><i class="fa fa-moon-o" aria-hidden="true"></i></button></a>

        EOL ;
    }else{
        $multipleBtn = <<<EOL
        <a href="login.php">LOGIN</a>
        <a href="register.php">REGISTER</a>
        <a><button id="themeMoon" class="button1" onclick="darkMode()"><i class="fa fa-moon-o" aria-hidden="true"></i></button></a>

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
    <title>YilmazFlix - Search Results</title>
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


    <h1 class="header">Search Results</h1>
    
<?php

    $query = urlencode($_GET["search"]);
    $jsondata = file_get_contents("https://api.themoviedb.org/3/search/movie?api_key=59419be18ecb300104521be9c3837f01&language=en-US&page=1&include_adult=false&query=$query");
    $data = json_decode($jsondata,true);
    

    foreach ($data["results"] as &$value) {   
            if(isset($value['poster_path'])){
                $poster_url= "http://image.tmdb.org/t/p/w500".$value['poster_path'];
            }
            else{
                $poster_url = "./img/no_img.jpg";
            }
                 
  
            echo '<div class="column">
            <div class="row">
                <a href="movie.php?id=' . $value['id'] . '"><img src="'.$poster_url. '" width="140" height="180"></a><h4>' . $value['title']. "</h4><h5>"." Rate : " . $value['vote_average'] . " | Vote : " . $value['vote_count'] ."</h5> </h6>"."Popularity : " . round($value['popularity']) . "</h6>
                </div>
                </div>";
    }

    
?>
    <script src="js/themeHandler.js"></script>

    <div class="footer">
        <div class="container">Copyright &copy; 2022 Yilmazflix</div>  
    </div>