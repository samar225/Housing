<?php
include("Product.php");
$product = new Product();
$products = $product->getProducts();
$productData = array(
	"uni" => $products
);
echo json_encode($productData);
