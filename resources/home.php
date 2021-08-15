<?php

    $conn = $pdo->open();

    try{
        $stmt = $conn->prepare("SELECT * FROM products");
        $stmt->execute();
        $products = $stmt->fetchAll();
        //dd($products);
    }
    catch(PDOException $e){
        echo "There is some problem in connection: " . $e->getMessage();
    }

    $pdo->close();

    $addedProducts = cartProducts();
?>

<div class='container py-5' id="qsale_products">
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <!-- <h1 class="display-4 fw-normal">All Gadgets</h1> -->
        <img class="img-fluid w-25" src="./resources/assets/images/undraw_social_friends.svg"/>
    </div>


    <?php include "./resources/components/search.php"; ?>

    <div class="row row-cols-1 row-cols-md-2 mb-3 list">
        <?php foreach($products as $product) { ?>
       
        <div class="col my-4">
            <div class="wrapper">
                <div class="product-img">
                    <img class="img-fluid" src="<?php echo './resources/assets/images/'.$product['photo'] ?>">
                </div>
                <div class="product-info">
                    <div class="product-text">
                        <h1 class="name"><?php echo substr($product['name'], 0, 20) ?></h1>
                        <h2>$<?php echo $product['price'] ?></h2>
                        <div><?php echo $product['description'] ?></div>
                    </div>
                    <div class="product-price-btn">
                        <button data-product-id="<?php echo $product['id']; ?>" type="button" class="add-to-cart-btn-js"><?php echo in_array($product['id'], $addedProducts) ? 'Added' : 'add to cart' ?> </button>
                    </div>
                </div>
            </div>
        </div>

        <?php } ?>
    </div>
</div>