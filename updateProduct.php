<?php
session_start();
include("include/mysqli_connect.php");
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
    $id = mysqli_real_escape_string($dbc, $_POST["id"]);
    $name = mysqli_real_escape_string($dbc, $_POST["name"]);
    $author = mysqli_real_escape_string($dbc, $_POST["author"]);
    $description = mysqli_real_escape_string($dbc, $_POST['description']);
    $price = mysqli_real_escape_string($dbc, $_POST["price"]);
    $quantity = mysqli_real_escape_string($dbc, $_POST['quantity']);
    $review = mysqli_real_escape_string($dbc, $_POST['review']);

    //old image file name
    $image = mysqli_real_escape_string($dbc, $_POST['image']);
    // a file updating the image
    $file_name = basename($_FILES["productImage"]["name"]);


    //select product by id for show the detail in the page even if there are some error..
    $productId = $_POST['id'];
    $query = "select * from products where id = '$productId'";
    $result = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($result);

    $errors = "";

    //if there is a new file then need to validate the file information
    if (!empty($file_name)) {
        $target_dir = "images/books/";
        $target_file = $target_dir . $file_name;

        $errors = "";
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        $image = $file_name;

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

        if (empty($file_name)) {
            $errors = $errors . "please insert a file name";
        }
    }


    if ($errors != "") {
        echo $errors;

    } else {

        if (empty($file_name)) {
            $query = "update products set name = '$name',author = '$author', description = '$description', price = $price, quantity = $quantity, review = '$review'  where id = '$id'";
            $result = mysqli_query($dbc, $query);
            if (!$result) {
                echo("Something occur when save data in Database ,Error code: " . mysqli_errno($dbc) . mysqli_error($dbc));
            } else {
                header("Location:products.php");
            }

            // if there is a new image file then upload file before we insert data to db
        } else {


            if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file)) {
//                delete old image file
                unlink(trim(dirname(__FILE__) ."/images/books/".$_POST['image'])) or die("Couldn't delete file");

                $query = "update products set name = '$name',author = '$author', description = '$description', price = $price, quantity = $quantity, review = '$review', image = '$image'  where id = '$id'";
                $result = mysqli_query($dbc, $query);
                if (!$result) {
                    echo("Something occur when save data in Database ,Error code: " . mysqli_errno($dbc) . mysqli_error($dbc));
                } else {
                    header("Location:productDetails.php?id=$id");
                }
            } else {
                echo "<br/>Sorry, there was an error uploading your file.";
            }
        }

    }


}
?>
<?php include("include/header.php"); ?>
<div class="container">
    <br/><br/>
    <div class="row">
        <div class="col-sm-5">
            <img width="440px" src="./images/books/<?php echo $row['image'] ?>">

        </div>
        <div class="col-sm-7 mx-auto ">
            <legend>Update Product</legend>
            <br/>
            <form method="post" action="updateProduct.php" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label"> Name</label>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $row['id'] ?>">
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
                        <input type="text" readonly class="form-control-plaintext" id="showImgName" name="image"
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
