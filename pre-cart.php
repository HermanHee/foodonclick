<?php

include "includes/header.php";
include "class/Menu.php";

if(isset($_POST['delete-from-cart'])) {
    $id = $_POST['item-id'];

    $index = array_search($id, $_SESSION['pre-cart']);
    unset($_SESSION['pre-cart'][$index]);
}

if(isset($_SESSION['pre-cart'])) {
    $items = $_SESSION['pre-cart'];
    $foods = array();
}

if(isset($items)) {
    $count = count($items);
    $total_price = 0;
    $menu = new Menu();
    foreach ($items as $item) {
        $food = $menu->getFood($item);
        array_push($foods, $food);
    }
}

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-5 px-2 py-3 mb-5">
                        <?php if(!empty($foods)): ?>

                            <div class="row">
                                <div class="col-lg-12 ">
                                    <section class="pt-5 pb-5">
                                            <form action="summary.php" method="post">
                                            <div class="row w-100">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <h3 class="display-5 mb-2 text-center">Shopping Cart</h3>
                                                    <p class="mb-5 text-center">
                                                        <i class="text-info font-weight-bold"><?php echo $count ?></i> items in your cart
                                                    </p>
                                                    <div class="cart-table">
                                                        <table id="shoppingCart" class="table table-condensed cart-table2">
                                                            <thead>
                                                            <tr>
                                                                <th style="width:60%">Product</th>
                                                                <th style="width:12%">Price</th>
                                                                <th style="width:10%">Quantity</th>
                                                                <th style="width:16%"></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php foreach ($foods as $food): $total_price += $food['price'] ?>

                                                                <tr>
                                                                    <td data-th="Product">
                                                                        <div class="row">
                                                                            <div class="col-md-3 col-3 text-left cart-img">
                                                                                <img src="Images/<?php echo $food['img'] ?>"
                                                                                     alt=""
                                                                                     class="img-fluid  rounded mb-2 shadow ">
                                                                            </div>
                                                                            <div class="col-md-9  col-9 text-left mt-sm-2">
                                                                                <h4><?php echo $food['name'] ?></h4>
                                                                                <input type="hidden" name="names[]" value="<?php echo $food['name'] ?>">
                                                                                <input type="hidden" name="item-ids[]" value="<?php echo $food['id'] ?>">
																				<input type="text" name="sInstr[]" class="form-control" placeholder="Special Instructions">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td data-th="Price" class="show-price">$<?php echo $food['price'] ?></td>
                                                                    <td data-th="Quantity">
                                                                        <input type="number" name="qty[]"
                                                                               class="form-control qty form-control-lg text-center"
                                                                               value="1" min="1">
                                                                        <input type="hidden" name="item-price[]" value="<?php echo $food['price'] ?>">
                                                                    </td>
                                                                    <td class="actions" data-th="">
                                                                        <div class="text-right">
                                                                            <form action=""></form>
                                                                            <form action="" method="post">
                                                                                <input type="hidden" name="item-id" value="<?php echo $food['id'] ?>">
                                                                                <button type="submit" name="delete-from-cart"
                                                                                        class="btn btn-white border-secondary bg-white btn-md mb-2">
                                                                                    <i class="fas fa-trash"></i>
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                            <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="float-right text-right">
                                                        <h4>Total:</h4>
                                                        <h1 id="show-total-price">$<?php echo $total_price ?></h1>
                                                        <input type="hidden" name="total-price" value="<?php echo $total_price ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-4 d-flex align-items-center">
                                                <div class="col-sm-3 order-md-2 text-right ml-auto ">
                                                    <button name="submit" type="submit" class="order-btn text-white"><a>Checkout</a></button>
                                                </div>
                                                <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                                                    <button style="margin-left: unset" class="order-btn text-white" onclick="history.go(-1); return false;"><a>Back</a></button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </section>
                                </div>
                            </div>

                        <?php else: ?>
                        <p>No items added to the cart yet!</p>
							<div class="col-lg-12 d-flex justify-content-center mt-2 mb-3">
								<button style="margin-left: unset" class="order-btn text-white" onclick="history.go(-1); return false;"><a>Back</a></button>
							</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php

include "includes/footer.php";

?>


<script>
    $('.qty').each(function () {
        $(this).on('change', function () {
            let items_price = $(this).val() * $(this).next().val()
            $(this).parent().prev().html('$' + items_price)
            let total_price = $('input[name="total-price"').val()
            total_price = parseInt(total_price) + parseInt($(this).next().val());
            $('input[name="total-price"').val(total_price)
            $('#show-total-price').html('$' + total_price)
        })
    })

</script>