<?php
    $products = [];

    if (isset($_GET['action']) && $_GET['action'] == 'checkout') {
        unset($_SESSION['cart']);
    }

    print_r($_SESSION['cart']);
?>

<a href="index.php?page=cart&action=checkout" class="btn btn-primary">Checkout</a>