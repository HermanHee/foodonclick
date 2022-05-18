<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

include "includes/header.php";
include "class/Order.php";

require_once "includes/phpmailer.php";

if(isset($_POST['place-order'])) {
	
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $loc = $_POST['loc'];
    $total_price = $_SESSION['items']['total-price'];

    $order = new Order($fname, $lname, $contact, $email, $loc, $total_price);

    $orderID = $order->addOrder();

    for ($i = 0; $i < count($_SESSION['items']['names']); $i++) {
	$order->addOrderItems($orderID, $_SESSION['items']['item-ids'][$i], $_SESSION['items']['qty'][$i], $_SESSION['items']['item-price'][$i] *  $_SESSION['items']['qty'][$i], $_SESSION['items']['sInstr'][$i]);
    }



        $subject = 'Thanks for the order!';
        $body = '<b>Order Details</b><br>';
        $body .= '<b>First Name :</b>' . $fname . '<br>';
        $body .= '<b>Last Name :</b>' . $lname . '<br>';
        $body .= '<b>Contact :</b>' . $contact . '<br>';
        $body .= '<b>Email :</b>' . $email . '<br>';
        $body .= '<b>Total Price :</b>$' . $total_price . '<br>';


        send_email($body, $subject, $email, $fname.' '.$lname);

    unset($_SESSION['items']);
    unset($_SESSION['cart']);

} else {
    echo '<script>location.href = "cart.php"</script>';
}

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-5 px-2 py-3 mb-5">
                        <div class="row d-flex flex-column p-5">
                            <h2>Thank You!</h2>
                            <br>
                            <p> Your order is placed. We have sent order details on your email.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



<?php

include "includes/footer.php";

?>