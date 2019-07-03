<?php
require_once("include/mysqli_connect.php");

$productId = $_GET['id'];
$query = "delete from products where id = $productId";
$result = mysqli_query($dbc, $query);

header("Location:products.php");