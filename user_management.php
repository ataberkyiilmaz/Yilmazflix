<?php
    session_start();
    include_once('config.php');
    if(!(isset($_SESSION['userGroup']) && $_SESSION['userGroup'] == 'admin')){
        header('Location: ./index.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" type="text/css" href="css/layout_styles.css?<?=filemtime('css/layout_styles.css');?>">
</head>
<body>

<h1 class="header">User Management</h1>

<table class="tb">
    <thead>
        <tr>
            <th class="col">id</th>
            <th class="col">username</th>
            <th class="col">email</th>  
            <th class="col">user group</th>
            <th class="col">actions</th>
        </tr>
    </thead>
    <?php
        $query = "SELECT*FROM tb_user";
        $result = mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $username = $row['username'];
            $email = $row['email'];
            $usertype = $row['userGroup'];
            echo '
            <tr>
                <td>'.$id.'</td>
                <td>'.$username.'</td>
                <td>'.$email.'</td>
                <td>'.$usertype.'</td>
                <td><button class="btn2"><a id="btn2" href="delete_user.php?deleteid='.$id.'">Delete</a></button></td>
            </tr>';

        }

    ?>

</body>
</html>