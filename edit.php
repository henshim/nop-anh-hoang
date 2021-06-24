<?php
include "Data.php";
include "Products.php";
if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
    $product = Data::getById($id);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_REQUEST['id'];
    $name = $_REQUEST['Name'];
    $price = $_REQUEST['Price'];
//    var_dump($name,$price);
//    die();
    $address = $_REQUEST['Address'];
    $image = $_REQUEST['image'];
    $product = new Products($id, $name, $price, $address, $image);
    Data::edit($id, $product);
    header('location: index.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Edit Product</title>
</head>
<body>
<div class="container">
    <h2>Update Information Of Product</h2>
    <form method="post">

        <div>
            <label for="name">Name:</label>
            <input type="text" class="from-control" name="Name" placeholder="Input Name"
                   value="<?php echo $product->getName() ?>">
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="text" class="from-control" name="Price" placeholder="Input Price"
                   value="<?php echo $product->getPrice() ?>">
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" class="from-control" name="Address" placeholder="Input Address"
                   value="<?php echo $product->getAddress() ?>">
        </div>
        <div>
            <label for="address">Image:</label>
            <input type="text" class="from-control" name="image" placeholder="Input image"
                   value="<?php echo $product->getImage() ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

</body>
</html>
<?php

?>

