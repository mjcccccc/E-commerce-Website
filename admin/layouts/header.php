<?php
session_start();
include('../server/connection.php');
$disableNavbar = isset($disableNavbar) ? $disableNavbar : false; // Set default value if not defined
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php if (!$disableNavbar) : ?>
    <nav class="navbar m-0 p-0 d-block">
        <h1 class="title text-start">DASHBOARD</h1>
    </nav>
<?php endif; ?>