<?php
$page = isset($_GET['page']) ? $_GET['page'] : '';
session_start();
include_once "pages/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayStation</title>
    <!-- CSS -->
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- ikon-font awesome -->
    <script src="https://kit.fontawesome.com/dfc284c098.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php"><i class="fa-brands fa-playstation"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Game</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Support</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hardware
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#product">PS4</a></li>
                            <li><a class="dropdown-item" href="#product">PS4 PRO</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#product">PS5</a></li>
                        </ul>
                </ul>
                </li>
                <li style="list-style:none;" class="nav-item">
                    <button class="btn btn-outline-dark" type="submit">Sign In</button>
                </li>
            </div>
        </div>
    </nav>

   


    <?php
    switch ($page) {
        case 'detail' :
            include "pages/detail.php";
            break;

            case 'tambah' :
            include "pages/tambah.php";
            break;
            
            case 'edit' :
            include "pages/edit.php";
            break;
            
            case 'cart' :
            include "pages/keranjang.php";
            break;
            
            default:
            include "pages/home.php";
            break;
    }
    ?>

    



    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
