<?php
global $DBConnectObj;
include 'server/connection.php';
session_start();

if(isset($_SESSION['cart']) || empty($_SESSION['cart']))
{
    echo "Cart is empty";
    exit();
}

$Cart = $_SESSION['cart'];
$products = [];

foreach ($Cart as $product_id => $quantity)
{
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $stmt = $DBConnectObj->prepare($sql);
    $stmt->execute([$product_id]);
    $product = $stmt->fetch();
    $product['quantity'] = $quantity;
    $products[] = $product;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/1f77cdf804.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/css/cartStyle.css"/>
</head>
<body>

<!--NavBar-->
<nav class="navbar navbar-expand-lg navbar-light bg-white bg-body-tertiary py-3 fixed-top">
    <div class="container">
        <img src="assets/images/logo.png" alt="logo" width="50" height="50" class="d-inline-block align-text-top">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="shop.html">Shop</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="Cart.html">Basket</a></li>
                        <li><a class="dropdown-item" href="Account.html">Account</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="About.html">About Us</a>
                </li>

            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>

            </form>
        </div>
    </div>
</nav>

<!--Cart-->
<section class="cart container my-5 py-5">
    <div class="container mt-5">
        <h2 class="font-weight-bold">Your Cart</h2>
    </div>

    <table class="mt-5 pt-5">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>
                <?php foreach ($products as $product): ?>
                <div class="product-info">
                    <img src="assets/images/JD9RX.jpg"/>

                    <div>
                        <p><?php echo htmlspecialchars($product['name']);?></p>
                        <small><span>R</span><?php echo htmlspecialchars($product['price']); ?></small>
                        <br>
                        <a class="remove-btn" href="#">Remove</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </td>

            <td>
                <span>R</span>
                <span class="Product-price">10,500,000</span>
            </td>

            <td>
                <input type="number" value="1"/>
                <a class="edit-btn" href="#">Edit</a>
            </td>

            <td>
                <span>R</span>
                <span class="Product-price">10,500,000</span>
            </td>

        </tr>

        <tr>
            <td>
                <div class="product-info">
                    <img src="assets/images/JD7R.jpg"/>

                    <div>
                        <p>John Deere 7R</p>
                        <small><span>R</span>6,500,000</small>
                        <br>
                        <a class="remove-btn" href="#">Remove</a>
                    </div>
                </div>
            </td>

            <td>
                <span>R</span>
                <span class="Product-price">10,500,000</span>
            </td>

            <td>
                <input type="number" value="1"/>
                <a class="edit-btn" href="#">Edit</a>
            </td>

            <td>
                <span>R</span>
                <span class="Product-price">10,500,000</span>
            </td>

        </tr>

        <tr>
            <td>
                <div class="product-info">
                    <img src="assets/images/JD8R.jpg"/>

                    <div>
                        <p>John Deere 8R</p>
                        <small><span>R</span>8,000,000</small>
                        <br>
                        <a class="remove-btn" href="#">Remove</a>
                    </div>
                </div>
            </td>

            <td>
                <span>R</span>
                <span class="Product-price">6,500,000</span>
            </td>

            <td>
                <input type="number" value="1"/>
                <a class="edit-btn" href="#">Edit</a>
            </td>

            <td>
                <span>R</span>
                <span class="Product-price">6,500,000</span>
            </td>

        </tr>
    </table>

    <div class="cart-total">
        <table>
            <tr>
                <td>Subtotal</td>
                <td><span>R</span>27,500,000</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td><span>R</span>3,500,000</td>
            </tr>

            <tr>
                <td>Total</td>
                <td><span>R</span>31,000,000</td>
        </table>
    </div>

    <div class="checkout-container">
        <button class="btn checkout-btn">Checkout</button>
    </div>
</section>

<div class="toast" id="logintoast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <strong class="me-auto">Login Required</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        You need to login to checkout
    </div>
</div>


<!--Footer-->
<footer class="mt-5 py-5">
    <div class="row container mx-auto pt-5">
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <img class="logo" src="assets/images/logo.png"/>
            <p class="pt-3">John Deere is a leading manufacturer in the agriculture environment</p>
        </div>
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pt-3">Quick Links</h5>
            <ul class="text-uppercase">
                <li><a href="#">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>

        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Contact Us</h5>
            <ul class="text-uppercase">
                <li><a href="#">+27 71 123 4567</a></li>
            </ul>
        </div>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>