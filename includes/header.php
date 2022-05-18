<?php
session_start();

include "db/connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodOnClick</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="<?php echo basename($_SERVER['PHP_SELF']) === 'index.php' ? 'home-page' : 'no-class' ?> w-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid px-0">
            <a class="navbar-brand" href="index.php">
                <img src="Images/general/logo2.png" alt="" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse w-100  justify-content-center w-100" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto  justify-content-around">
                    <li class="nav-item">
                        <a class="nav-link active nav-home" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reservation.php">Reservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="delivery.php">Delivery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="OurStory.php">Our Story</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="HoursandLocation.php">Hours & Location</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminLoginPage.php">Admin Login</a>
                    </li>
                </ul>
                <?php if(basename($_SERVER['PHP_SELF']) !== 'reservation.php'): ?>

                    <button class="cart-btn2 ml-auto mx-3">
                        <a href="<?php echo basename($_SERVER['PHP_SELF']) == 'preorder-menu.php' || basename($_SERVER['PHP_SELF']) == 'pre-cart.php' ? 'pre-cart.php' : 'cart.php' ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                        d="M4.4160156 1.9960938L1.0039062 2.0136719L1.0136719 4.0136719L3.0839844 4.0039062L6.3789062 11.908203L5.1816406 13.822266C4.3432852 15.161017 5.3626785 17 6.9414062 17L19 17L19 15L6.9414062 15C6.8301342 15 6.8173041 14.978071 6.8769531 14.882812L8.0527344 13L15.521484 13C16.247484 13 16.917531 12.605703 17.269531 11.970703L20.871094 5.484375C21.242094 4.818375 20.760047 4 19.998047 4L5.25 4L4.4160156 1.9960938 z M 7 18 A 2 2 0 0 0 5 20 A 2 2 0 0 0 7 22 A 2 2 0 0 0 9 20 A 2 2 0 0 0 7 18 z M 17 18 A 2 2 0 0 0 15 20 A 2 2 0 0 0 17 22 A 2 2 0 0 0 19 20 A 2 2 0 0 0 17 18 z" />
                            </svg>
                        </a>

                    </button>

                <?php endif; ?>
            </div>
        </div>
    </nav>