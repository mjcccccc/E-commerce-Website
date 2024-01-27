<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE (product_category LIKE '%Men%' OR product_category LIKE '%Unisex%') AND product_category NOT LIKE '%Women%' LIMIT 6");

$stmt->execute();

$men_products = $stmt->get_result();

?>