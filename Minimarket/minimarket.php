<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Marketplace</title>
  <link rel="stylesheet" href="minimarket.css">
</head>

<body>
<nav id="navbar">
        <ul>
            <li class="home-li"><a href="../Index/index.php">Green Basket</a></li>

            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="../Login/logout.php">Sign Out</a></li>
            <?php else: ?>
                <li><a href="../Login/login.php">Login/SignUp</a></li>
            <?php endif; ?>

<<<<<<< HEAD
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'seller'): ?>
                <li><a href="../Seller/sellerform.php">Sell</a></li>
            <?php else: ?>
                <li><a href="../Donation/donation.php">Donation</a></li>
            <?php endif; ?>
=======
      <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'seller'): ?>
        <li><a href="../Seller/sellerform.php">Sell</a></li>
      <?php else: ?>
        <li><a href="../Donation/donation.php">Donation</a></li>
      <?php endif; ?>
>>>>>>> 22f4fc6f7e0d07111afc60626651c63e5d141cbd

            <li><a href="../Myprofile/myprofile.php">My Profile</a></li>
            <li id="backetli"><a href="../Minimarket/minimarket.php">Marketplace</a></li>
        </ul>
    </nav>

  <!-- automatic slidebar  -->
  <article class="wrapper">
    <div class="marquee">
      <div class="marquee__group">
        <span>
          <img src="../assets/m_img/2.jpg" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/m_img/13.jpg" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/m_img/15.jpg" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/m_img/25.jpg" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/m_img/29.jpg" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/m_img/20.jpg" style="height:60px; width:50px; " alt="">
        </span>
      </div>

      <div aria-hidden="true" class="marquee__group">
        <span>
          <img src="../assets/m_img/2.jpg" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/m_img/13.jpg" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/m_img/15.jpg" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/m_img/25.jpg" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/m_img/29.jpg" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/m_img/20.jpg" style="height:60px; width:50px; " alt="">
        </span>

      </div>
    </div>

    <!-- Special offer -->
    <div id="main">
      <main>
        <div id="left">
          <div id="top">
            <div id="head">
              <h1>Special <span style="color: green;">Offer</span></h1>
            </div>
            <div id="information">
              <!-- Add Information here  -->
              <p>Transform your gardening experience with our Automatic Garden Sprinkler System! Designed for efficiency, it covers large areas with adjustable spray distance, ensuring every plant gets the hydration it needs. Made from durable materials, it’s easy to install—just connect to your garden hose—and saves water while promoting healthy growth. Perfect for home gardens, greenhouses, and farms, this system allows you to spend less time watering and more time enjoying your beautiful outdoor space. Elevate your gardening today and order now!</p>
            </div>
          </div>
          <div id="bot">
            <button> <a href="">Grab Offer</a></button>
          </div>
        </div>

        <div id="right">
          <img src="../assets/m_img/19.jpg" alt="">
        </div>
      </main>
    </div>

    <!-- Tractor section -->
    <div id="girds">

      <div id="main_grid">
        <div id="header">
          <h1>Machinery</h1>
        </div>
        <div id="information">
          <div id="photos">
            <div id="grid">
              <div id="grid-item">
                <img src="../assets/m_img/16.jpg" alt="">
                <img src="../assets/m_img/15.jpg" alt="">
                <img src="../assets/Machinery/tractor/1.jpg" alt="">
                <img src="../assets/Machinery/1.jpg" alt="">
                <img src="../assets/m_img/31.jpg" alt="">
                <img src="../assets/Machinery/tractor/4.jpg" alt="">
                <img src="../assets/Machinery/tractor/2.jpg" alt="">
                <img src="../assets/Machinery/tractor/5.jpg" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Tools section -->
      <div id="main_grid">
        <div id="header">
          <h1>Farming Tools</h1>
        </div>
        <div id="photos">
          <div id="grid">
            <div id="grid-item">
              <img src="../assets/m_img/20.jpg" alt="">
              <img src="../assets/m_img/22.jpg" alt="">
              <img src="../assets/m_img/39.jpg" alt="">
              <img src="../assets/m_img/14.jpg" alt="">
              <img src="../assets/m_img/33.jpg" alt="">
              <img src="../assets/m_img/.jpg" alt="">
              <img src="../assets/m_img/.jpg" alt="">
              <img src="../assets/m_img/.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Button to explore more -->
    <div id="explore">
      <button>
        <a href="../Marketplace/marketplace.php">
          Explore more..
        </a>
      </button>
    </div>

    <footer>

    </footer>


    <script src="minimarket.js"></script>
</body>

</html>