<?php
$products = [
    ["name" => "guitar", "price" => 900, "brand" => "Schecter", "stock" => 0],
    ["name" => "ukulele", "price" => 100, "brand" => "Fender", "stock" => 5],
    ["name" => "drums", "price" => 100, "brand" => "Pearl", "stock" => 1]
];

$transform = function($p) { return "<li>".$p["name"]." - $".$p["price"]." (".$p["stock"]." available)</li>"; };

function map_products($productList, $transform) {
    $productDetail = [];
    foreach($productList as $product){
        $productDetail[] = $transform($product);
    }
    return $productDetail;
}

function show_products($productList){
    $productItem = "";
    foreach($productList as $product){
        $productItem .= $product;
    }
    return "<ul>".$productItem."</ul>";
}

echo show_products(map_products($products, $transform));
