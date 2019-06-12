<?php
session_start();
include("include/mysqli_connect.php");
include("include/header.php");
?>


<?php
if (isset($_GET['productId'])) {
    $productId = $_GET['productId'];
    $query = "select * from products where id = '$productId'";
    $result = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($result);
}
?>

<?php
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($dbc, $_POST["name"]);
    $author = mysqli_real_escape_string($dbc, $_POST["author"]);
    $description = mysqli_real_escape_string($dbc, $_POST['description']);
    $price = mysqli_real_escape_string($dbc, $_POST["price"]);
    $quantity = mysqli_real_escape_string($dbc, $_POST['quantity']);
    $review = mysqli_real_escape_string($dbc, $_POST['review']);

    $errors = "";

    $target_dir = "images/books/";
    $file_name = basename($_FILES["productImage"]["name"]);
    $target_file = $target_dir . $file_name;

    $errors = "";
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


    $check = getimagesize($_FILES["productImage"]["tmp_name"]);
    if ($check == false) {

        $errors = "Sorry, this is not an image file";
    }


    if (file_exists($target_file)) {
        $errors = $errors . "<br/>Sorry, file already exists.";

    }

    if ($_FILES["productImage"]["size"] > 50000000) {
        $errors = $errors . "<br/>Sorry, your file is too large.";

    }

    if ($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        $errors = $errors . "<br/>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

    if (empty($name)) {
        $errors = $errors . "please insert a file name";
    }

    if ($errors != "") {
        echo $errors;

    } else {
        if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file)) {
            $query = "insert into products (name, author, description, price, quantity, review,image) VALUES ('$name','$author','$description',$price,$quantity,'$review','$file_name')";
            $result = mysqli_query($dbc, $query);
            if (!$result) {
                echo("Something occur when save data in Database ,Error code: " . mysqli_errno($dbc) . mysqli_error($dbc));
            } else {
                header("Location:products.php");
            }
        } else {
            echo "<br/>Sorry, there was an error uploading your file.";
        }
    }


}
?>
<div class="container">
    <br/><br/>
    <div class="row">
        <div class="col-sm-5">
            <img   width="440px" src="./images/books/<?php echo $row['image']?>">
            
        </div>
        <div class="col-sm-7 mx-auto ">
            <legend>Add New Product</legend>
            <br/>
            <form method="post" action="editProduct.php" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"> Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="name" name="name"
                               value="<?php echo $row['name'] ?>">
                    </div>

                    <label for="inputPassword" class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="author" name="author" placeholder=""
                               value="<?php echo $row['author'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"> Price</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="price" name="price"
                               value="<?php echo $row['price'] ?>">
                    </div>

                    <label for="inputPassword" class="col-sm-2 col-form-label">Quantity</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="quantity" name="quantity" placeholder=""
                               value="<?php echo $row['quantity'] ?>">
                    </div>
                </div>
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label">Picture</label>
                    <div class="col-sm-4">
                        <input type="text" readonly class="form-control-plaintext" id="showImgName"
                               value="<?php echo $row['image'] ?> ">
                    </div>
                </div>
                <div class="input-group row">
                    <label for="productImage" class="col-sm-2 col-form-label"> </label>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="productImage" id="productImage">
                            <label class="custom-file-label" for="productImage">Choose file...</label>
                        </div>
                    </div>
                </div>
                <br/>

                <div class="form-group">
                    <label> Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5"
                              placeholder="Please type description here...(under 500 words)"><?php echo $row['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label>Review</label>
                    <textarea class="form-control" id="review" name="review" rows="5"
                              placeholder="Please type review here...(under 1000 words)"><?php echo $row['review'] ?></textarea>
                </div>
                <button name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>



<?php
include("include/footer.php");
?>
