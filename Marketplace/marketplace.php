<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <link rel="stylesheet" href="marketplace.css">
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

            <li><a href="../Donation/donation.php">Donation</a></li>
            <li><a href="../Myprofile/myprofile.php">My Profile</a></li>
            <li id="backetli"><a href="../Basket/basket.php">Basket</a></li>
        </ul>
    </nav>
    <main>

        <div id="left">
            <div id="search">
                <h4>Search :</h4>
                <input type="text" id="search" name="search" placeholder="Search or type keywords"><br>
            </div>
            <div id="header">
                <h1>Filters</h1>
            </div>
            <div id="section1">

                <div id="type">
                    <!-- Category Filters -->
                    <h4>Categories</h4>
                    <input type="checkbox" id="item1" name="category" value="Machinery">
                    <label for="item1">Machinery</label><br>

                    <input type="checkbox" id="item2" name="category" value="Tools">
                    <label for="item2">Tools Used in Farming</label><br>

                    <input type="checkbox" id="item3" name="category" value="Seeds">
                    <label for="item3">Seeds</label><br>

                    <input type="checkbox" id="item4" name="category" value="Fertilizer">
                    <label for="item4">Fertilizer</label><br>

                    <input type="checkbox" id="item5" name="category" value="Pesticides">
                    <label for="item5">Pesticides & Herbicides</label><br>

                    <input type="checkbox" id="item6" name="category" value="AnimalHusbandry">
                    <label for="item6">Animal Husbandry</label><br>

                    <input type="checkbox" id="item7" name="category" value="Irrigation">
                    <label for="item7">Irrigation Equipment</label><br>

                    <input type="checkbox" id="item8" name="category" value="Packaging">
                    <label for="item8">Packaging & Storage</label><br>

                    <input type="checkbox" id="item9" name="category" value="ProtectiveGear">
                    <label for="item9">Protective Gear</label><br>

                    <input type="checkbox" id="item10" name="category" value="EcoFriendly">
                    <label for="item10">Eco-Friendly Products</label><br><br>
                </div>
            </div>
            <div id="section2">
                <h4>Price Range</h4>
                <label for="minPrice">Min:</label>
                <input type="number" id="minPrice" name="minPrice" placeholder="₹0"><br>

                <label for="maxPrice">Max:</label>
                <input type="number" id="maxPrice" name="maxPrice" placeholder="₹50000"><br><br>
            </div>


        </div>
        <div id="right">

        </div>
    </main>
</body>

</html>