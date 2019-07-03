<?php
session_start();

include("include/header.php");
require_once("include/mysqli_connect.php");
$productId = $_GET['id'];
$query = "select * from products where id = '$productId'";

$result = mysqli_query($dbc, $query);

$row = mysqli_fetch_array($result);

?>
<div class="container">
    <br/>

    <div class="row">
        <div class="col-md-5">

            <img class="shadow-lg p-3 mb-5 bg-white rounded" src="./images/books/<?php echo $row['image'] ?>"
                 width="440px">
        </div>
        <div class="col-md-6">
            <br/>

            <?php
                if (isset($_SESSION['userName']) && isset($_COOKIE['userName']))
                    echo "<a class='btn btn-info btn-sm float-right' href='updateProduct.php?productId=$productId'>Edit Product</a>";
                     echo "<a class='btn btn-danger btn-sm float-right'  style='margin-right : 10px' href='deleteProduct.php?id=$productId'>Delete</a>";
            ?>

            <h3><?php echo $row['name'] ?></h3>
            <br/>
            <p class="text-muted"><?php echo $row['author'] ?></p>
            <p><?php echo $row['description'] ?></p>
            <small class="text-muted">review ---------------------------------------------------------------</small>
            <p><?php echo $row['review'] ?></p>
            <a class="badge badge-info float-lg-right" href="products.php">Back</a>
        </div>
    </div>
</div>
<?php

include("include/footer.php");
?>
