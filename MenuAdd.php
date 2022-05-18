<?php
include "includes/headerChef.php";
include "class/Menu.php";
$menu = new Menu();

$categories = $menu->categories();
?>

<?php

$adminuid = $_SESSION["uid"];
$adminuserid = $_SESSION["userid"];
$adminpassword = $_SESSION["password"];
$adminfirstname = $_SESSION["firstname"];
$adminlastname = $_SESSION["lastname"];
$adminphone = $_SESSION["phone"];
$adminemail = $_SESSION["email"];


if(isset($_POST['create'])){

    $category_id = $_POST['category'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    $target_dir = "Images/";
    $imageFileType = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
    $target_file = md5(uniqid()).'.'.$imageFileType;
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir.$target_file);
    $menu->create($category_id, $name, $price, $target_file);
    ob_start();
    header('Location: MenuPage.php');
}// main if ends here



?>

<!DOCTYPE HTML>
<html lang="en">
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/standardise.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>

<div class="mainheader">
    <header>Add Menu</header>
</div>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select required name="category" id="category" class="form-control">
                            <option value="">Choose category</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="image" required accept="image/*">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" required id="name">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" required id="price">
                    </div>
                    <div class="form-group">
                        <button name="create" type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('.custom-file input').change(function (e) {
        if (e.target.files.length) {
            $(this).next('.custom-file-label').html(e.target.files[0].name);
        }
    });
</script>
</body>
</html>

<?php

include "includes/footer.php";

?>