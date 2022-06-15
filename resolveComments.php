<?php

    if(!isset($_POST['movie_id'])){
        header('Location: ./index.php');
        exit;
    }

    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: ./login.php');
        exit;
    }

    require_once 'config.php';
    $sql= "insert into tb_comments (uid,date,comment,movie_id) values (?,?,?,?)";
    $stmt = mysqli_prepare($conn,$sql);
    $uid = $_SESSION['uid'];
    $date = date('Y-m-d H:i:s');
    $comment = $_POST['comment'];
    $movie_id = $_POST['movie_id'];
    mysqli_stmt_bind_param($stmt,'ssss',$uid,$date,$comment,$movie_id);

    if(mysqli_stmt_execute($stmt)){
        echo " <script>alert('The comment added successfully.')</script>";
        header('Location: ./movie.php?id='.$movie_id.'');
    }



 ?>
