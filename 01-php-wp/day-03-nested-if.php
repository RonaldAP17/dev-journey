<?php
$products = [
    ["name" => "guitar", "price" => 900, "brand" => "Schecter", "stock" => 0],
    ["name" => "ukulele", "price" => 100, "brand" => "Fender", "stock" => 5],
    ["name" => "drums", "price" => 100, "brand" => "Pearl", "stock" => 1]
];

function get_products_html($productList){
    $productDetail = "";
    foreach($productList as $product){
        if ($product["stock"] > 0) {
            $productDetail = $productDetail."<li>".$product["name"]." - $".$product["price"]." (".$product["stock"]." available)"."</li>";
        } else {
            $productDetail = $productDetail."<li>".$product["name"]." - OUT OF STOCK"."</li>";
        }
    }
    $productItems = "<ul>".$productDetail."</ul>";
    return $productItems;
}

echo get_products_html($products);
