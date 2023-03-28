<?php
if (isset($_POST['submit'])){
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->execute([$_POST['email']]);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $user = $stmt->fetch();

    if($user){
        if (password_verify($_POST['password'], $user['password'])) {
            $_SESSION['userId'] = $user['id'];
            header('location: /index.php?page=home');
        } else {
            echo "username atau passwordmu tidak valid";
        }
    } else {
        echo "usernamemu atau password tidak valid";
    }
}
?>



<div class="container">

    <form action="/index.php" method="post" class="d-flex flex-column gap-2">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email"  class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" name="password" id="password" class="form-control">
        </div>
        <input type="submit" value="LOGIN" name="submit" class="btn btn-primary">

        <p>Belum Punya Akun ? Silakan  <a href="/index.php?page=register">Daftar Disini !</a>  </p>


    </form>
</div>