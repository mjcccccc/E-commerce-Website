<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category LIKE '%Kids%' LIMIT 6");

$stmt->execute();

$kids_products = $stmt->get_result();

?>