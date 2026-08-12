<?php
$products = [
    ["name" => "guitar", "price" => 900, "brand" => "Schecter", "stock" => 0],
    ["name" => "ukulele", "price" => 100, "brand" => "Fender", "stock" => 5],
    ["name" => "drums", "price" => 100, "brand" => "Pearl", "stock" => 1]
];

function get_products_filtered($productList, $field, $value){
    $productDetail = [];
    foreach($productList as $product){
        if ($product[$field] == $value) {
            $productDetail[] = $product;
        }
    }
    return $productDetail;
}

function show_products($productList){
    $productItem = "";
    $productItems = "";
    foreach($productList as $product){
         $productItem = $productItem."<li>".$product["name"]." - $".$product["price"]." (".$product["stock"]." available)"."</li>";
    }
    $productItems = "<ul>".$productItem."</ul>";
    return $productItems;
}

echo show_products(get_products_filtered($products, "name", "guitar"));