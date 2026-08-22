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

// seed value for the reduce step
$initial = 0;

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

// --- Composition with pipe -------------------------------------------------

// pipe: takes any number of functions and returns a NEW function that runs a
// value through all of them, left to right. The returned closure is itself a
// reduce over the list of functions: the accumulator is the flowing value and
// each function transforms it.
function pipe(...$fns) {
    return function($seed) use ($fns) {
        $acc = $seed;
        foreach($fns as $fn){
            $acc = $fn($acc);
        }
        return $acc;
    };
}

// single-argument steps: each freezes its callback so pipe can feed just the data
$filterStep = function($x) use($inStock){
    return filter_products($x, $inStock);
};

$mapStep = function($x) use($toStockValue){
    return map_products($x, $toStockValue);
};

$reduceStep = function($x) use($sum, $initial){
    return reduce_products($x, $sum, $initial);
};

// total value of available stock, read left to right: filter -> map -> reduce
$pipeline = pipe($filterStep, $mapStep, $reduceStep);
echo $pipeline($products);
