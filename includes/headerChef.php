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
            <a class="navbar-brand" href="ChefHomePage.php">
                <img src="Images/general/logo2.png" alt="" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse w-100  justify-content-center w-100" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto">
					<li>
                        <a class="nav-link" href="MenuAdd.php" >Add Menu<span class="sr-only"></span></a>
					</li>
                    <li>
                        <a class="nav-link" href="MenuPage.php" >Manage Menu<span class="sr-only"></span></a>
                    </li>
					<li>
					   <a class="nav-link" href="class/logout.php" >Log Out<span class="sr-only"></span></a>
					</li>
				</ul>
            </div>
        </div>
    </nav>