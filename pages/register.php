<?php
if (isset($_POST['submit'])) {
    $conn = connect();
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['name'], $_POST['email'], $hashed_password]);
}
?>



<div class="container">

    <form action="/index.php?page=register" method="post" class="d-flex flex-column gap-2">
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" name="password" id="password" class="form-control">
        </div>
        <input type="submit" value="Register" name="submit" class="btn btn-primary">


    </form>
</div>