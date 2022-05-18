<?php

include "includes/header.php";
include "class/Menu.php";

$menu = new Menu();

$categories = $menu->categories();

if(isset($_POST['add-to-cart'])) {
    $id = $_POST['item-id'];

    if(empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array($id);
        echo '<script>alert("Item added to the cart!")</script>';
    } else {
        if(in_array($id, $_SESSION['cart'])) {
            echo '<script>alert("Item already added to the cart!")</script>';
        } else {
            $_SESSION['cart'][] = $id;
            echo '<script>alert("Item added to the cart!")</script>';
        }
    }
}
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
                                                <button type="submit" name="add-to-cart" class="cart-btn">
                                                    <a>
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                            <path
                                                                    d="M4.4160156 1.9960938L1.0039062 2.0136719L1.0136719 4.0136719L3.0839844 4.0039062L6.3789062 11.908203L5.1816406 13.822266C4.3432852 15.161017 5.3626785 17 6.9414062 17L19 17L19 15L6.9414062 15C6.8301342 15 6.8173041 14.978071 6.8769531 14.882812L8.0527344 13L15.521484 13C16.247484 13 16.917531 12.605703 17.269531 11.970703L20.871094 5.484375C21.242094 4.818375 20.760047 4 19.998047 4L5.25 4L4.4160156 1.9960938 z M 7 18 A 2 2 0 0 0 5 20 A 2 2 0 0 0 7 22 A 2 2 0 0 0 9 20 A 2 2 0 0 0 7 18 z M 17 18 A 2 2 0 0 0 15 20 A 2 2 0 0 0 17 22 A 2 2 0 0 0 19 20 A 2 2 0 0 0 17 18 z" />
                                                        </svg>
                                                    </a>
                                                </button>
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