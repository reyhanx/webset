<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
$conn = connect();
if (isset($_POST['submit'])) {
    $stmt = $conn->prepare("UPDATE product SET nama = ?, stock = ?, image = ?, price = ? WHERE id = ?");
    $stmt->execute([$_POST['nama'], $_POST['stock'], $_POST['image'], $_POST['price'], $id]);
}
$stmt = $conn->prepare("SELECT * FROM product WHERE id = ?");
$stmt->execute([$id]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$product = $stmt->fetch();
?>

<div class="container">

    <form action="/index.php?page=edit&id=<?php echo $id ?>" method="post" class="d-flex flex-column gap-2">
        <div class="form-group">
            <label for="Nama">Nama</label>
            <input type="text" name="nama" id="nama" value="<?php echo $product['nama'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="Stock">Stock</label>
            <input type="text" name="stock" id="stock" value="<?php echo $product['stock'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="Image">Image</label>
            <input type="text" name="image" id="image" value="<?php echo $product['image'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="Price">Price</label>
            <input type="text" name="price" id="price" value="<?php echo $product['price'] ?>" class="form-control">
        </div>
        <input type="submit" value="submit" name="submit" class="btn btn-primary">

        <a href="/index.php?page=detail&id=<?php echo $product['id'] ?>"><- BACK</a>

    </form>
</div>