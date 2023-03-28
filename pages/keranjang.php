<?php
    $products = [];
    if(!empty($_SESSION["cart"])) {

    }   else 
    {
        echo "Belum ada produk di cart";
    }
    if (isset($_GET['action']) && $_GET['action'] == 'checkout') {

        // save to database

        $today = date("Y-m-d");
        $query = "INSERT INTO transaction(date, userId) VALUES (?, ?);";
        $conn = connect();
        $stmt = $conn->prepare($query);
        $stmt->execute([$today, $_SESSION['userId']]);


        // save transaction_products
        $id = $conn->lastInsertId();
        foreach ($_SESSION['cart'] as $cart) {
            $query = "INSERT INTO transaction_product(transaction_id, product_id, qty, price) VALUES (?, ?, ?, ?);";
            $stmt = $conn->prepare($query);
            $stmt->execute([$id, $cart['id'], $cart['qty'], $cart['price']]);
        }
        $id = $conn->lastInsertId();

         unset ($_SESSION['cart']);
    }

    
?>



<pre>
    <?php  print_r($_SESSION['cart']); ?>
</pre>

<a href="index.php?page=cart&action=checkout" class="btn btn-primary">Checkout</a>



