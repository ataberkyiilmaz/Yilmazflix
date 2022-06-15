<?php
define('DB_SERVER', 'eu-cdbr-west-02.cleardb.net');
define('DB_USERNAME', 'b7b753487bbf4c');
define('DB_PASSWORD', 'ce5ff5ea');
define('DB_NAME', 'heroku_e1aa435735d9ba6');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}