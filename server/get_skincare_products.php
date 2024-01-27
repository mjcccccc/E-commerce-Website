<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category LIKE '%Skincare%' LIMIT 6");

$stmt->execute();

$skincare_products = $stmt->get_result();

?>