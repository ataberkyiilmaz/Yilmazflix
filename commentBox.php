<?php
    date_default_timezone_set('Europe/Istanbul');
?>
<?php
    include 'config.php';

    function setComment($conn){
        if(isset($_POST['commentSubmit'])){
            $uid = $_POST['uid'];
            $date = $_POST['date'];
            $comment = $_POST['comment'];

            $sql= "insert into tb_comments (uid,date,comment ) values ('$uid','$date','$comment')";
            echo $sql;
            $result= $conn->query($sql);
        }
    }
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/layout_commentBox.css?<?=filemtime('css/layout_commentBox.css');?>">
    <title>commentBox</title>
</head>
<body>
<?php 
echo '
<form method="POST" action="./resolveComments.php">
    <input type="hidden" name="uid" value="anonymous">
    <input type="hidden" name="date" value="'.date('Y-m-d H-i-s').'">
    <textarea name="comment"></textarea>
    <button type="submit" name="commentSubmit">Comment</button>

</form>';
?>

</body>
</html>