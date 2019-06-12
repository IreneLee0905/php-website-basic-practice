<?php


session_start();
session_destroy();

setcookie("userName", "", time() - 60 * 60 * 2);
header("Location:index.php");

