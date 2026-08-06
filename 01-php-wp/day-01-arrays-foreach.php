<?php
$products = ["guitar" => 1300, "ukulele" => 900 , "drums" => 5000];
foreach($products as $product => $price){
    echo "<li>"."Value of ".$product.": ".$price."</li>";
}