<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE (product_category LIKE '%Gadget%' OR product_category LIKE '%Appliances%') LIMIT 6");

$stmt->execute();

$tech_products = $stmt->get_result();

?>