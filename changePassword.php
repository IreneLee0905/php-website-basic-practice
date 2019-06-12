<?php
session_start();
require_once("include/mysqli_connect.php");
include("include/header.php");

?>

<br/><br/>
<div class="col-sm-3 mx-auto">
    <h3 class="text-center">Change Password</h3>
    <br/>
    <form method="post" action="changePassword.php">

        <?php
        if (isset($_POST['submit'])) {

            $account = mysqli_real_escape_string($dbc,$_SESSION['userName']);
            $oldPassword = mysqli_real_escape_string($dbc,$_POST['oldPassword']);
            $newPassword = mysqli_real_escape_string($dbc,$_POST['newPassword']);
            $confirmPassword = mysqli_real_escape_string($dbc,$_POST['confirmPassword']);
            $errors = "";
            if ($confirmPassword != $newPassword) {
                $errors = "the new password and confirm password are different, please check your password and try again";
            }

            if($newPassword == $oldPassword){
                $errors = $errors. "<br/>you can't use same password as new password";
            }

            if (empty($errors)) {
                $query = "select * from accounts where email = '$account' and password = 'SHA($oldPassword) '";
                $result = mysqli_query($dbc, $query);
                $num = mysqli_num_rows($result);


                if ($num == 0) {
                    echo '<div class="alert alert-danger" role="alert">the old password is incorrect.</div>';
                } else {

                    $updateQuery = "update accounts set password = 'SHA($newPassword)' where email = '$account'";
                }
            } else {

                echo '<div class="alert alert-danger" role="alert">'.$errors . '</div>';
            }

        }
        ?>
        <div class="form-group">
            <label for="email">Old Password</label>
            <input type="password" class="form-control" name="oldPassword" placeholder="" id="oldPassword">
        </div>
        <div class="form-group">
            <label for="newPassword">New Password</label>
            <input type="password" class="form-control" name="newPassword" placeholder="" id="newPassword">
        </div>

        <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" class="form-control" name="confirmPassword" placeholder="" id="confirmPassword">
        </div>
        <br/>
        <button type="submit" name="submit" class="btn btn-info btn-block">Submit</button>

    </form>
</div>

<?php
include("include/footer.php");
?>
