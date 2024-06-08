<?php
global $DBConnectObj;
include 'server/connection.php';
$sql = "SELECT * FROM products";
$stmt = $DBConnectObj->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <script src="https://kit.fontawesome.com/1f77cdf804.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="assets/css/ProductStyle.css"/>
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
               <a class="nav-link active" aria-current="page" href="index.html">Home</a>
             </li>

             <li class="nav-item">
               <a class="nav-link" aria-current="page" href="shop.php">Shop</a>
             </li>

             <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Profile
               </a>

               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="Cart.php">Basket</a></li>
                 <li><a class="dropdown-item" href="Account.html">Account</a></li>
                 <li><hr class="dropdown-divider"></li>
                 <li><a class="dropdown-item" href="#">Contact Us</a></li>
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

     <section class=" container single-product my-5 pt-5">
       <div class="row mt-5">
         <div class="col-lg-5 col-md-6 col-sm-12">
           <img class="img-fluid w-100 pb-1" src="assets/images/JD9RX.jpg" id="mainImg"/>
           <div class="small-img-group">
             <div class="small-img-col">
               <img src="assets/images/JD9RXINT.jpg" width="100%" class="small-img"/>
             </div>
             <div class="small-img-col">
               <img src="assets/images/JD9RXFR.jpg" width="100%" class="small-img"/>
             </div>
             <div class="small-img-col">
               <img src="assets/images/JD9RXBK.jpg" width="100%" class="small-img"/>
             </div>
             <div class="small-img-col">
               <img src="assets/images/JD9RXSDE.jpg" width="100%" class="small-img"/>
             </div>
           </div>
         </div>

         <div class="col-lg-6 col-md-12 col-sm-12">
           <h6>Home / Tractors</h6>
           <h1>John Deere 9RX</h1>
           <h4>R10 500 000</h4>
           <select>
             <option>Select Engine Size</option>
             <option>200 KW</option>
             <option>400 KW</option>
             <option>600 KW</option>
           </select>
           <input type="number" value="1"/>
           <button class="btn btn-primary">Add to Cart</button>
           <h3>Product Details <i class="fas fa-indent"></i></h3>
           <p>John Deere 9RX is a powerful tractor that is designed to handle the toughest conditions. It is a 4WD tractor that is perfect for large scale farming. It has a 620 HP engine and a 30,000 lb weight. It is a great tractor for any farmer that is looking for a reliable and powerful machine.</p>
         </div>

       </div>
     </section>

     <!--Related Products-->
     <section id="Related" class="my-5 pb-5">
       <div class="container text-center mt-5 py-5">
         <h3>Related Products</h3>
         <hr>
         <p>Products You May Like</p>
       </div>
       <div class="row mx-auto container-fluid">
         <div class="product col-lg-3 col-md-4 col-sm-12">
           <img class="img-fluid md-3" src="assets/images/JD8R.jpg"/>

           <h5 class="p-name">John Deere 8R</h5>
           <h4 class="p-price">R10 000 000</h4>
           <button class="Buy-btn">Buy Now</button>
         </div>

         <div class="product col-lg-3 col-md-4 col-sm-12">
           <img class="img-fluid md-3" src="assets/images/JD7R.jpg"/>

           <h5 class="p-name">John Deere 7R</h5>
           <h4 class="p-price">R6 500 000</h4>
           <button class="Buy-btn">Buy Now</button>
         </div>

         <div class="product col-lg-3 col-md-4 col-sm-12">
           <img class="img-fluid md-3" src="assets/images/JD6.jpeg"/>

           <h5 class="p-name">John Deere 6 series</h5>
           <h4 class="p-price">R4 500 000</h4>
           <button class="Buy-btn">Buy Now</button>
         </div>
       </div>
     </section>


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

<!--Java to change images at product page-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
     var mainImg =  document.getElementById("mainImg");
     var smallImg = document.getElementsByClassName("small-img");


     for(let i=0; i<4; i++){
     smallImg[i].onclick = function(){
     mainImg.src = smallImg[i].src;
      }
     }
</script>

</body>
</html>