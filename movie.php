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
    <link rel="stylesheet" href="css/layout_commentBox.css?<?=filemtime('css/layout_commentBox.css');?>">
    <?php
    $id = urlencode($_GET["id"]);
    $data = file_get_contents("https://api.themoviedb.org/3/movie/$id?api_key=59419be18ecb300104521be9c3837f01&language=en-US");
    $data = json_decode($data,true);

    echo '<title>'.$data['original_title'].'</title>';
    ?>
    
</head>

<body>
    <header>
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
</header>

<?php
    $id = urlencode($_GET["id"]);
    $data = file_get_contents("https://api.themoviedb.org/3/movie/$id?api_key=59419be18ecb300104521be9c3837f01&language=en-US");
    $data = json_decode($data,true);

    foreach($data['genres'] as $result){
        $category = $result['name'];
    }

        echo 
        ' <div class="layout1">
        <div class="photo">
            <img class = "poster" src="'."http://image.tmdb.org/t/p/w500".''. $data['poster_path'] . '" width="200" height="250">
        </div>
        <div class="info">
            <h1 class="orgTitle">'.$data['original_title'].'</h1>
            <h4 class="genre">'.$category.'</h4><br>
            <p>'.$data['overview'].'</p><br>
            <p><b>Popularity : </b>'.$data['popularity'].'</p>
            <p><b>Release Date : </b>'.$data['release_date'].'</p>
            <p><b>Status : </b>'.$data['status'].'</p>
            <p><b>Vote Average : </b>'.$data['vote_average'].'</p>

        </div>
        </div>';
    ?>
<b></b>
<?php
    $movie_id = urlencode($_GET["id"]);
    $data = file_get_contents("https://api.themoviedb.org/3/movie/$movie_id/videos?api_key=59419be18ecb300104521be9c3837f01&language=en-US");
    $data = json_decode($data,true);
        foreach($data['results'] as $result){
            if($result['site'] == "YouTube")
            {
                $video_key= $result['key'];
                break;
            }
        }
        if(isset($video_key)){       
        echo '<div class="trailer">
            <iframe class="video" width="560" height="315" src="'."https://www.youtube.com/embed/".$video_key.'" frameborder="0" allowfullscreen></iframe></div>';
            }else{
                echo '<p class="err-message">No trailers available.</p>';
            }
?>
    <h2>Comments</h2><br><br>
<?php 
        echo '';
        require_once 'config.php';
        $sql= "SELECT username,date,cid,comment FROM tb_comments INNER JOIN tb_user ON tb_user.id=tb_comments.uid where movie_id=? ORDER BY date DESC;";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,'i',$movie_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
            
        
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()) {

            
                echo '
                <div class="comment">
                <div class="comment-body">
                    <h3 class="comment-head">'.$row['username'].'</h3>
                    <p class="comment">'.$row['comment'].'</p>
                    <p class="comment-date">'.$row['date'].'</p><br>
                </div>
            </div>';
              }
        }


    echo '
    <form method="POST" action="./resolveComments.php">    
        <input type="hidden" name="movie_id" value="'.$movie_id.'">
        <textarea name="comment" placeholder="type your reviews.."></textarea>
        <button class="btn3" type="submit" name="commentSubmit">Comment</button>
    </form>';

        

?>


<script src="js/themeHandler.js"></script>
<div class="footer">
        <div class="container">Copyright &copy; 2022 Yilmazflix</div>        
    </div>

