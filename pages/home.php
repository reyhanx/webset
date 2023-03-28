<?php
$conn = connect();
$stmt = $conn->prepare("SELECT * FROM product");
$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_ASSOC);
$product = $stmt->fetchAll();
?>



<!-- Landing Page -->
<section class="home" id="home">
    <div class="content">
        <h3>PlayStation 5 Console</h3>
        <p>Experience an all-new generation of incredible PlayStation games. PS5 consoles are currently in stock.</p>
    </div>
    <div>
        <img src="img/ps5.png" alt="">
    </div>
</section>


<div class="button">
    <a href="index.php?page=tambah" class="btn btn-primary">tambah</a>
    <a href="index.php?page=cart" class="btn btn-primary">cart</a>
</div>



<!-- product -->
<section class="TopProductt">
    <h1 class="heading">PRODUCT </h1>
    <div class="general-container">
        <div class="product_container">

            <?php foreach ($product as $k => $product) : ?>

                <div class="product_box" id="product">
                    <h2 class="product_box_name"> <?php echo $product['nama'] ?> </h2>
                    <a href="/index.php?page=detail&id=<?php echo $product['id'] ?>" class="product_box_info">Info</a>
                    <div class="product_box_circle"></div>
                    <img src="<?php echo $product['image'] ?>" alt="" class="product_box_product">
                </div>

            <?php endforeach; ?>
</section>
