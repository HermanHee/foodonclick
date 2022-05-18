<?php

include "includes/header.php";

$items = array();

if(isset($_POST['submit'])) {

    $items = $_POST;
    $_SESSION['items'] = $items;

} else {
    echo '<script>location.href = "cart.php"</script>';
}


?>

<style>

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<section>
	<div class="row">
		<div class="col-lg-12">
			<div class="container">
				<div class="card mt-5 px-2 py-3 mb-5">
					<form action="thankyou.php" method="post" class="card-container">
						<div class="row">
							<div class="col-50">
								<h2 class="heading-secondary mb-3">
									Booking Details
								</h2>

								<label for="exampleInputEmail1" class="form-label">First Name</label>
								<input required type="text" name="fname" class="form-control" id="exampleInputEmail1"
									aria-describedby="emailHelp">


								<label for="exampleInputEmail1" class="form-label">Last Name</label>
								<input required type="text" name="lname" class="form-control" id="exampleInputEmail1"
									aria-describedby="emailHelp">


								<label for="exampleInputEmail1" class="form-label">Phone Number</label>
								<input required placeholder="82543456" type="text" pattern="[89][0-9]{7}" name="contact" class="form-control" id="exampleInputEmail1"
									aria-describedby="emailHelp">


								<label for="exampleInputEmail1" class="form-label">Email</label>
								<input required type="email" name="email" class="form-control" id="exampleInputEmail1"
									aria-describedby="emailHelp">


								<label for="exampleInputEmail1" class="form-label">Location to
									Deliver</label>
								<input required type="text" name="loc" class="form-control" id="exampleInputEmail1"
									aria-describedby="emailHelp">

							</div>
							<div class="col-50">
								<h2 class="heading-secondary mb-3 ">
                                    Your Order
                                </h2>
                                <table class="table mt-5">
                                    <thead>
                                        <tr>
                                            <th>Items</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i=0; $i<count($items['names']); $i++): ?>

                                            <tr>
                                                <td scope="row"><?php echo $items['names'][$i] ?>
												<br>
												<?php echo "*" . $items['sInstr'][$i] ?>
												</td>
                                                <td><?php echo $items['qty'][$i] ?></td>
                                                <td>$<?php echo $items['item-price'][$i] ?></td>
                                            </tr>

                                        <?php endfor; ?>
                                        <tr>
                                            <th>Total</th>
                                            <th></th>
                                            <th>$<?php echo $items['total-price'] ?></th>
                                        </tr>
                                    </tbody>
                                </table>
								
								<h2 class="heading-secondary mb-3 ">
                                    Card Details
                                </h2>
								
								<label for="ccnum">Credit card number</label>
								<input required type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
								<div class="row">
									<div class="col-50">
										<label for="expyear">Exp Date</label>
										<input required type="text" id="expyear" name="expyear" placeholder="01/22">
									</div>
									<div class="col-50">
										<label for="cvv">CVV</label>
										<input required type="text" id="cvv" name="cvv" placeholder="352">
									</div>
								</div>
							</div>
							
							<button type="submit" name="place-order" class="order-btn text-white"><a>Checkout</a></button>
							
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>



<?php

include "includes/footer.php";

?>