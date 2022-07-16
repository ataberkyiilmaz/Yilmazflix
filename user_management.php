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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
</head>
<body>

<h1 class="header">User Management</h1>

<table id = "example" class="table table-striped table-bordered" style="width:100%">
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

        echo '</tbody>
        ';

    ?>

<script src="./js/script2.js"></script>
</body>
</html>