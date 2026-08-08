  <?php
  $products = ["guitar" => 1300, "ukulele" => 900 , "drums" => 5000];

  function get_the_products($productList){
      $productDetail = "";
      foreach($productList as $product => $price){
      $productDetail = $productDetail."<li>"."Value of ".$product.": ".$price."</li>";
  }
      $productList = "<ul>".$productDetail."</ul>";
      return $productList;
  }

  echo get_the_products($products);