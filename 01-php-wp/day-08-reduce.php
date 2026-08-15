<?php
$products = [
    ["name" => "guitar", "price" => 900, "brand" => "Schecter", "stock" => 0],
    ["name" => "ukulele", "price" => 100, "brand" => "Fender", "stock" => 5],
    ["name" => "drums", "price" => 100, "brand" => "Pearl", "stock" => 1]
];

$reduce = function($acc, $p) {
    return $acc + $p["price"];
};

function reduce_products($productList, $reduce, $initial) {
    $acc = $initial;
    foreach ($productList as $product) {
        $acc = $reduce($acc, $product);
    }
    return $acc;
}

echo reduce_products($products, $reduce, 0);
