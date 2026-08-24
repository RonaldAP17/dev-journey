<?php
$products = [
    ["name" => "guitar", "price" => 900, "brand" => "Schecter", "stock" => 0],
    ["name" => "ukulele", "price" => 100, "brand" => "Fender", "stock" => 5],
    ["name" => "drums", "price" => 100, "brand" => "Pearl", "stock" => 1]
];

// --- Callbacks (same ones you already wrote) -------------------------------

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

// --- pipe (reused from day-10) ---------------------------------------------

function pipe(...$fns) {
    return function($seed) use ($fns) {
        $acc = $seed;
        foreach ($fns as $fn) {
            $acc = $fn($acc);
        }
        return $acc;
    };
}

// --- Steps, now backed by PHP's NATIVE higher-order functions --------------
// Same semantics as the handmade versions, but leaning on the language.
// Watch the argument order: array_map takes the callback FIRST, the others
// take the array first. array_filter preserves keys, so array_values reindexes
// the result into a clean 0..n list for the steps that follow.

$filterStep = function($x) use ($inStock) {
    return array_values(array_filter($x, $inStock));
};

$mapStep = function($x) use ($toStockValue) {
    return array_map($toStockValue, $x);
};

$reduceStep = function($x) use ($sum, $initial) {
    return array_reduce($x, $sum, $initial);
};

// --- Run it ----------------------------------------------------------------

// total value of available stock, read left to right: filter -> map -> reduce
$pipeline = pipe($filterStep, $mapStep, $reduceStep);
echo $pipeline($products); // expected: 600
