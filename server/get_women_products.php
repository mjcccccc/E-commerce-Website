<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category LIKE '%Women%' OR product_category LIKE '%Unisex%' LIMIT 6");

$stmt->execute();

$women_products = $stmt->get_result();

?>