<?php
if (isset($_POST['submit'])) {
    
    $query = ("INSERT INTO product(nama, stock, price) VALUES(?, ?,  ?)");
    $conn = connect();
    $stmt = $conn->prepare($query);
    $stmt->execute([$_POST['nama'], $_POST['stock'], $_POST['price']]);

    $id = $conn->lastInsertId();
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $filename = "image/$id.$ext";
    move_uploaded_file($_FILES['image']['tmp_name'], $filename);
    $stmt = $conn->prepare("UPDATE product SET image = ? WHERE id = ?");
    $stmt->execute([$filename, $id]);
}
?>

<div class="container">
    <form action="/index.php?page=tambah" method="post" enctype="multipart/form-data" class="d-flex flex-column gap-2">
        <div class="form-group">
            <label for="Nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control">
        </div>
        <div class="form-group">
            <label for="Stock">Stock</label>
            <input type="text" name="stock" id="stock" class="form-control">
        </div>

        <!-- <div class="form-group">
            <label for="Image">Image</label>
            <input type="text" name="image" id="image" class="form-control">
        </div> -->
        <div class="form-group">
            <label for="Price">Price</label>
            <input type="text" name="price" id="price" class="form-control">
        </div>
        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg" class="form-control">
        </div>
        <input type="submit" value="submit" name="submit" class="btn btn-primary">
    </form>
</div>