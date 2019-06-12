<?php
$dbc = mysqli_connect('127.0.0.1', 'irene', 'p@ssw0rd', 'web2');

if (mysqli_connect_errno()) {
    echo "FATAL ERROR:</br></br>Database Connection Failed: ", mysqli_connect_error();
    exit();
}


