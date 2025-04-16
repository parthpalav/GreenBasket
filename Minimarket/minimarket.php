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
      <span>
        <label for="search">Search:</label>
        <input type="text" id="search" placeholder="Search...">
      </span>
      <ul>
        <li><a href="../Login/login.php">Login/SignUp</a></li>
        <li><a href="../Donation/donation.php">Donation</a></li>
        <li><a href="../Myprofile/myprofile.php">My Profie</a></li>
        <li id="backetli"><a href="../Basket/basket.php ">Basket</a></li>
      </ul>
    </ul>
  </nav>

  <!-- automatic slidebar  -->
  <article class="wrapper">
    <div class="marquee">
      <div class="marquee__group">
        <span>
          <img src="../assets/index_pg_tool/tool2.jpeg" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/index_pg_tool/tool1.jpg" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/person/patil" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/person/patil" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/person/patil" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/person/patil" style="height:60px; width:50px; " alt="">
        </span>
      </div>

      <div aria-hidden="true" class="marquee__group">
        <span>
          <img src="../assets/person/patil" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/person/patil" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/person/patil" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/person/patil" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/person/patil" style="height:60px; width:50px; " alt="">
        </span>
        <span>
          <img src="../assets/person/patil" style="height:60px; width:50px; " alt="">
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
              <p>Add information here</p>
            </div>
          </div>
          <div id="bot">
            <button> <a href="">Grab Offer</a></button>
          </div>
        </div>

        <div id="right">
          <img src="../assets/index_pg_tool/too1.jpg" alt="">
        </div>
      </main>
    </div>

    <!-- Tractor section -->
    <div id="girds">

      <div id="main_grid">
        <div id="header">
          <h1>Tractor</h1>
        </div>
        <div id="information">
          <div id="photos">
            <div id="grid">
              <div id="grid-item">
                <img src="" alt="">
                <img src="" alt="">
                <img src="" alt="">
                <img src="" alt="">
                <img src="" alt="">
                <img src="" alt="">
                <img src="" alt="">
                <img src="" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Tools section -->
        <div id="main_grid">
          <div id="header">
            <h1>Tools</h1>
          </div>
            <div id="photos">
              <div id="grid">
                <div id="grid-item">
                  <img src="" alt="">
                  <img src="" alt="">
                  <img src="" alt="">
                  <img src="" alt="">
                  <img src="" alt="">
                  <img src="" alt="">
                  <img src="" alt="">
                  <img src="" alt="">
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