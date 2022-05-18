<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "vendor/autoload.php";

include "includes/header.php";
include "class/Reservation.php";
require_once "includes/phpmailer.php";

if(isset($_SESSION['reservation']) && !isset($_POST['submit'])) {
    $fname = $_SESSION['reservation']['fname'];
    $lname = $_SESSION['reservation']['lname'];
    $contact = $_SESSION['reservation']['contact'];
    $email = $_SESSION['reservation']['email'];
    $pax = $_SESSION['reservation']['pax'];
    $date_time = date('Y-m-d H:i', strtotime($_SESSION['reservation']['date-time']));

    $reservation = new Reservation($fname, $lname, $contact, $email, $pax, $date_time);
    $reservationID = $reservation->addReservation();

    $reservation = $_SESSION['reservation'];
    $_SESSION['reservation']['id'] = $reservationID;

    $body = '<b>Reservations Details</b><br>';
    $body .= '<b>First Name :</b>' . $fname . '<br>';
    $body .= '<b>Last Name :</b>' . $lname . '<br>';
    $body .= '<b>Contact :</b>' . $contact . '<br>';
    $body .= '<b>Email :</b>' . $email . '<br>';
    $body .= '<b>Pax :</b>' . $pax . '<br>';
    $body .= '<b>Date & Time</b>' . $date_time . '<br>';

    send_email($body, "'Thanks for the order!'", $email, $fname.' '.$lname);


} elseif (isset($_SESSION['reservation']) && isset($_POST['submit'])) {
    $fname = $_SESSION['reservation']['fname'];
    $lname = $_SESSION['reservation']['lname'];
    $contact = $_SESSION['reservation']['contact'];
    $email = $_SESSION['reservation']['email'];
    $pax = $_SESSION['reservation']['pax'];
    $date_time = date('Y-m-d H:i', strtotime($_SESSION['reservation']['date-time']));

    $reservationObj = new Reservation($fname, $lname, $contact, $email, $pax, $date_time);
    $reservationID = $reservationObj->addReservation();

    $reservation = $_SESSION['reservation'];
    $_SESSION['reservation']['id'] = $reservationID;

    for ($i = 0; $i < count($_POST['names']); $i++) {
        $reservationObj->addPreOrder($reservationID, $_POST['item-ids'][$i], $_POST['qty'][$i], $_POST['item-price'][$i] *  $_POST['qty'][$i]);
    }

    $body = '<b>Reservations Details</b><br>';
    $body .= '<b>First Name :</b>' . $fname . '<br>';
    $body .= '<b>Last Name :</b>' . $lname . '<br>';
    $body .= '<b>Contact :</b>' . $contact . '<br>';
    $body .= '<b>Email :</b>' . $email . '<br>';
    $body .= '<b>Pax :</b>' . $pax . '<br>';
    $body .= '<b>Date & Time</b>' . $date_time . '<br>';

    send_email($body, "'Thanks for the order!'", $email, $fname.' '.$lname);

    unset($_SESSION['pre-cart']);
} else {
    echo '<script>location.href = "reservation.php"</script>';
}

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class=" mt-5 py-3">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="summary-detail mx-auto card2">
                                    <h2 class="heading-secondary text-center">
                                        Summary
                                    </h2>
                                    <div class="row mt-4">
                                        <div class="col-lg-6 col-md-6 col-6">
                                            <ul class="caption-list">
                                                <li>
                                                    <p class="text-summary">Name :</p>
                                                </li>
                                                <li>
                                                    <p class="text-summary">Email :</p>
                                                </li>
                                                <li>
                                                    <p class="text-summary">Phone Number :</p>
                                                </li>
                                                <li>
                                                    <p class="text-summary">Pax :</p>
                                                </li>
                                                <li>
                                                    <p class="text-summary">Date & Time :</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-6">
                                            <ul>
                                                <li>
                                                    <p class="text-summary"><?php echo $reservation['fname'] . " " . $reservation['lname'] ?></p>
                                                </li>
                                                <li>
                                                    <p class="text-summary"><?php echo $reservation['email'] ?></p>
                                                </li>
                                                <li>
                                                    <p class="text-summary"><?php echo $reservation['contact'] ?></p>
                                                </li>
                                                <li>
                                                    <p class="text-summary"><?php echo $reservation['pax'] ?></p>
                                                </li>
                                                <li>
                                                    <p class="text-summary"><?php echo date('Y-m-d H:i', strtotime($reservation['date-time'])) ?></p>
                                                </li>
                                            </ul>
                                        </div>
                                        <?php if(isset($_POST['submit'])): ?>
                                        <div class="col-lg-12 col-md-6 col-12">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p class="text-summary mb">Pre Order :</p>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <?php for($i = 0; $i < count($_POST['names']); $i++): ?>

                                                <div class="row ">
                                                    <div class="col-lg-4 col-4">
                                                        <p class="text-summary mb-0"><?php echo $_POST['names'][$i] ?></p>
                                                    </div>
                                                    <div class="col-lg-4 col-4">
                                                        <p class="text-summary mb-0">$<?php echo $_POST['item-price'][$i] ?></p>
                                                    </div>
                                                    <div class="col-lg-4 col-4">
                                                        <p class="text-summary mb-0"><?php echo $_POST['qty'][$i] ?> Items</p>
                                                    </div>
                                                </div>

                                            <?php endfor; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="row mt-4 d-flex align-items-center">
                <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                    <a href="menu.php" class="continue">
                        <i class="fas fa-arrow-left mr-2"></i> Continue Shopping</a>
                </div>
            </div>
        </div>
    </section>


<?php

include "includes/footer.php";
unset($_SESSION['reservation']);

?>