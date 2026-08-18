<?php
$products = [
    ["name" => "guitar", "price" => 900, "brand" => "Schecter", "stock" => 0],
    ["name" => "ukulele", "price" => 100, "brand" => "Fender", "stock" => 5],
    ["name" => "drums", "price" => 100, "brand" => "Pearl", "stock" => 1]
];

// --- Callbacks -------------------------------------------------------------

// keep only products with stock > 0
$inStock = function($p) {
    return $p["stock"] > 0;
};

// turn a product into its stock value: price * stock
$toStockValue = function($p) {
     return $p["price"] * $p["stock"];
};

// sum accumulator
$sum = function($acc, $value) {
    return $acc + $value;
};

// --- Higher-order functions (the ones you already built) -------------------

function filter_products($productList, $inStock) {
    $productItems = [];
    forEach($productList as $product){
        if($inStock($product)){
            $productItems[] = $product;
        }
    }
    return $productItems;
}

function map_products($productList, $toStockValue) {
    $productPrice = [];
    forEach($productList as $product){
        $productPrice[] = $toStockValue($product);
    }
    return $productPrice;
}

function reduce_products($productList, $sum, $initial) {
    $acc = $initial;
    forEach($productList as $product){
        $acc = $sum($acc, $product);
    }
    return $acc;
}

// --- Composition -----------------------------------------------------------

// total value of available stock (price * stock) for in-stock products only
$total = reduce_products(map_products(filter_products($products, $inStock), $toStockValue), $sum, 0);

echo $total;
