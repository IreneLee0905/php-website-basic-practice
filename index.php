<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <!--jquery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <!--popper-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <!--bootstrap-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <!--bs-custom-file-input-->
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/pricing.css">

    <script src="https://unpkg.com/ionicons@4.4.2/dist/ionicons.js"></script>
    <title>Final Assessment</title>
    <!--bs-custom-file-input-->
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init()
        })
    </script>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark ">
        <a class="navbar-brand" href="index.php">
            <img src="../images/rocket-icon-vector.png" width="50" height="50" alt="">
        </a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
            </li>
            <?php
            if (isset($_SESSION['userName']) && isset($_COOKIE['userName'])) {
                echo ' <li class="nav-item"><a class="nav-link" href="editProduct.php">Edit</a></li>';
            }

            ?>
            <li class="nav-item">
                <a class="nav-link" href="pricing.php">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">AboutUs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Q&A</a>
            </li>

        </ul>

        <?php
        if (!isset($_SESSION['userName']) || !isset($_COOKIE['userName'])) {
            echo '<ul class="navbar-nav">';
            echo ' <li class="nav-item"><a class="nav-link text-info" href="login.php">Login  /  </a></li> ';
            echo '</ul>';
        }


        ?>
        <?php

        if (isset($_SESSION['userName']) && isset($_COOKIE['userName'])) {
            $userName = $_SESSION['userName'];
            $pos = strpos($userName,'@');
            $userName = strtoupper(substr($userName,0,$pos));
            echo '<div class="btn-group">
                        <button class="btn btn-outline-info  dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Hello ' . $userName . '
                        </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="changePassword.php">Change Password</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                          </div>';
        }
        ?>

        <?php
        if (!isset($_SESSION['userName']) || !isset($_COOKIE['userName']))
            echo '<a class="btn btn-outline-info" href="register.php">Register Now</a>'
        ?>

    </nav>
</div>
<div class="container">
    <style>
        body {
            background: url("./images/background.jpg");

        }
    </style>
    <div id="hello" class="word col-sm-5" style="left:660px">HELLO</div>
    <div id="block">
        <?php
        $userName = $_SESSION['userName'];
        if (!isset($_SESSION['userName']) || !isset($_COOKIE['userName'])){
            echo " <h1>WORLD</h1>";
        }else{
            $userName = $_SESSION['userName'];
            $pos = strpos($userName,'@');
            $userName = strtoupper(substr($userName,0,$pos));
            echo "<h1>$userName</h1>";
        }
        ?>

    </div>
    <div id="title">
        <!--<ion-icon id="planet" name="planet"></ion-icon>-->
        <a class="align-middle" style="text-decoration:inherit;color: #FFFFFF" href="register.php">Say
            hello to the future ></a>
    </div>
    <?php
    include("include/footer.php");
    ?>
