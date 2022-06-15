<?php
include 'config.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $query="DELETE FROM tb_user WHERE id=$id";
    $result=mysqli_query($conn,$query);
    if($result){
        header('location:user_management.php');
    }else{
        die(mysqli_error($conn));
    }
}

?>