<?php

if (session_status() == PHP_SESSION_NONE) {
  // If session is not already started, start the session
  session_start();
}
//include('../server/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARTY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>

    <div class="container">

    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img class="logo" src="./assets/imgs/logo.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="mall.php">Mall</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="women_products.php">Women</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="men_products.php">Men</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kids_products.php">Kids</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tech_products.php">Electronics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="skincare_products.php">Skin Care</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">
                        <i class="fa-solid fa-cart-shopping m-0 p-0"></i>
                        <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity'] != 0) { ?>
                            <span class="cart-quantity"><?php echo $_SESSION['quantity']; ?></span>
                        <?php } ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="account.php">
                        <i class="fa-solid fa-circle-user m-0 p-0"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    </nav>
