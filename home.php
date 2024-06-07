   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/1f77cdf804.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/css/style.css"/>
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
                  <li><a class="dropdown-item" href="Cart.php">Basket</a></li>
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

      <style>
        body {
          background-image: url('assets/images/back.png');
        }
        </style>


      <!--Home-->
      <section id="home">
       <div class="container">
        <h5>AGRICULTURE TRACTORS</h5>
        <h1>John Deere 1 series - 9 series</h1>
        <p> It doesn’t matter if you’ve never driven a tractor, mowed a lawn, or operated a dozer. With our role in helping produce food, fiber, fuel, and infrastructure, we work for every single person on the planet.</p>
        <button>Shop Now</button>
       </div>    
      </section>

     <!--New-->
      <section id="new" class="w-100">
        <div class="row p-0 m-0">
          <!--9RX-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/images/JD9RX.jpg"/>
            <div class="details">
              <h3>John Deere 9RX</h3>
              <p>John Deere 9RX Series Tractors feature the CommandView III cab, which provides operators with a comfortable and convenient work environment.</p>

            </div>
          </div>
          <!--8R-->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/images/JD8R.jpg"/>
            <div class="details">
              <h3>John Deere 8R</h3>
              <p>John Deere 8R Series Tractors feature the CommandView III cab, which provides operators with a comfortable and convenient work environment.</p>

            </div>
          </div>
            <!--7R-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
              <img class="img-fluid" src="assets/images/JD7R.jpg"/>
              <div class="details">
                <h3>John Deere 7R</h3>
                <p>John Deere 7R Series Tractors feature the CommandView III cab, which provides operators with a comfortable and convenient work environment.</p>

              </div>
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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>