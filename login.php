<?php

session_start();
require_once("include/mysqli_connect.php");
if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $query = "select * from accounts where email='$email' and password=SHA('$password')";


    $result = mysqli_query($dbc, $query);
    $num = mysqli_num_rows($result);

    if ($num == 0) {
//        echo "<script>document.writeln(document.getElementById('error').innerHTML = 'aaaa');</script>";
        echo "<div class=\"alert alert-danger\" role=\"alert\">No match found</div>";
    } else {
        $row = mysqli_fetch_array($result);
        $_SESSION['userName'] = $email;
        setcookie("userName", $email, time() + 60 * 60 * 2);
        header("Location:products.php");

    }
}


include("include/header.php");

?>
    <style>
        .login {
            background-image: url('images/steve-johnson-632871-unsplash.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

    </style>

    <div class="login">
        <br/>
        <div class="mx-auto col-sm-4 shadow-lg mb-5 bg-white rounded" style="margin:100px;padding: 50px;">
            <div id="error"></div>
            <h3 class="text-center">Login</h3>
            <form action="login.php" method="post">

                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" class="form-control" name="email" placeholder="" id="email">
                </div>
                <div class="form-group">
                    <label for="address">password</label>
                    <input type="password" class="form-control" name="password" placeholder="" id="password">
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input id="conform" type="checkbox" class="form-check-input">
                        <label for="conform">I agree to terms and conditions</label>
                    </div>

                </div>
                <button type="submit" name="login" class="btn btn-info  btn-block">Login</button>

            </form>

        </div>
        <br/>
        <br/><br/> <br/><br/>
        <br/><br/> <br/>
        <br/><br/>
        <br/><br/>

    </div>
<?php
include("include/footer.php")
?>