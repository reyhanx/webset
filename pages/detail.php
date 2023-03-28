<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
$conn = connect();
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $stmt = $conn->prepare("DELETE FROM product WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: /index.php');
}
$stmt = $conn->prepare("SELECT * FROM product WHERE id = ?");
$stmt->execute([$id]);

$stmt->setFetchMode(PDO::FETCH_ASSOC);
$product = $stmt->fetch();

// $_SESSION['cart'] = [];

if (isset($_GET['action']) && $_GET['action']=='addToCart') {
    $found = false;
    foreach ($_SESSION['cart'] as $key => $cart) {
        if ($cart['id'] == $product['id']) {
            $cart['qty']++;
            $_SESSION['cart'][$key] = $cart;
            $found = true;
        }
    }
    if ($found == false) {
        $_SESSION['cart'][] = [
            
            'id' => $product['id'],
            'name' => $product['nama'],
            'qty' => '1',
            'image' => $product['image'],
            'price' => $product['price']
        ];

    }

}
?>


<div class="container">

    <h2><?php echo $product['nama'] ?> </h2>
    <p><?php echo $product['stock'] ?> </p>
    <p><?php echo $product['price'] ?> </p>
    <a href="/index.php?page=edit&id=<?php echo $id ?>">EDIT</a>
    <a href="/index.php?page=detail&id=<?php echo $id ?>&action=delete">DELETE</a>
    <a href="/index.php?page=detail&id=<?php echo $id ?>&action=addToCart">ADD TO CART</a>
    <a href="/index.php">BACK</a>
</div>