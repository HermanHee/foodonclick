<?php

include "includes/header.php";
include "class/Menu.php";

$menu = new Menu();

$categories = $menu->categories();

?>

<?php foreach ($categories as $category):

    $foods = $menu->foods($category['id']);
    ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
                                            <form action="" method="post">
                                                <input type="hidden" name="item-id" value="<?php echo $food['id'] ?>">
                                            </form>
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