<?php

require_once("include/mysqli_connect.php");

$email = mysqli_real_escape_string($dbc, $_POST['email']);
$password = mysqli_real_escape_string($dbc, $_POST['password']);
$firstName = mysqli_real_escape_string($dbc, $_POST['firstName']);
$lastName = mysqli_real_escape_string($dbc, $_POST['lastName']);
$country = mysqli_real_escape_string($dbc, $_POST['country']);
$address = mysqli_real_escape_string($dbc, $_POST['address']);
$date = mysqli_real_escape_string($dbc, $_POST['date']);
$month = mysqli_real_escape_string($dbc, $_POST['month']);
$year = mysqli_real_escape_string($dbc, $_POST['year']);

$birth = $year . "-" . $month . "-" . $date;
$query = "select * from accounts where email='$email'";
$result = mysqli_query($dbc, $query);
$num = mysqli_num_rows($result);

if ($num == 0) {

    $insertQuery = "insert into accounts (email, password, first_name, last_name, country, address, birthday)
                    values('$email',SHA('$password'),'$firstName','$lastName','$country','$address','$birth')";

    $insertResult = mysqli_query($dbc, $insertQuery);
    if($insertResult){

    }else{
        echo("Something occur when save data in Database ,Error code: " . mysqli_errno($dbc).mysqli_error($dbc));
    }


} else {

    echo "the email is already exist! please try another email";
}


