<?php

require_once("include/mysqli_connect.php");

$search = mysqli_real_escape_string($dbc,$_GET['search']);

$query = "select * from products where name like '%$search%'";
$result = mysqli_query($dbc, $query);


$nextLine = true;
while ($row = mysqli_fetch_array($result)) {

    if($nextLine){
        echo "<div class='card-group'>";
    }
    $productId = $row['id'];
    $description = substr($row['description'],0,200) ;
    echo "
        <div class='card mb-3' style='max-width: 500px; margin: 40px;' onclick='window.location.href = \"productDetails.php?id=$productId\";'>
            <div class='row no-gutters'>
                <div class='col-md-4'>
                    <img src='./images/books/".$row['image']."' class='card-img' >
                </div>
                <div class='col-md-8'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $row['name'] . "</h5>
                        <p class='card-text'>
                            <small class='text-muted'>" . $row['author'] . "</small>
                        </p>
                        <p class='card-text'> " . $description . "...</p>
                        
                    </div>
                </div>
            </div>
        </div>";
    if(!$nextLine){
        echo "</div>";
        $nextLine = true;
    }else{
        $nextLine = false;
    }

}