<?php
include "includes/headerChef.php";
include "class/Menu.php";

$menu = new Menu();

$categories = $menu->categories();

if(isset($_GET['menu_id'])){
    $menu->deleteMenu($_GET['menu_id']);
    ob_start();
    header("Location: MenuPage.php");
}

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
            <header>Manage Menu</header>
        </div>
    </body>
</html>

<?php foreach ($categories as $category):

    $foods = $menu->foods($category['id']);
    ?>

    <section>
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h2 class="heading-secondary">
                        <?php echo $category['name'] ?>
                    </h2>
                    <div class="row">
                        <?php foreach ($foods as $food): ?>

                            <div class="col-lg-4 col-12">
                                <div class="card mt-3">
                                    <img src="Images/<?php echo $food['img'] ?>" alt="Avatar"
                                         style="width:100%">
                                    <div class="card-container">
                                        <h4><b><?php echo $food['name'] ?></b></h4>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0 card-text"><?php echo $food['price'] ?>$</p>
                                            <div>
                                                <a href="MenuEdit.php?menu_id=<?= $food['id'] ?>" class="btn btn-success"><i class="fa fa-pencil-alt"></i></a>
                                                <a href="?menu_id=<?= $food['id'] ?>" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endforeach; ?>


<?php

include "includes/footer.php";

?>