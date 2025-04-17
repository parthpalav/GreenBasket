<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="index_style.css">
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

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'seller'): ?>
                <li><a href="../Seller/sellerform.php">Sell</a></li>
            <?php else: ?>
                <li><a href="../Donation/donation.php">Donation</a></li>
            <?php endif; ?>

            <li><a href="../Myprofile/myprofile.php">My Profile</a></li>
            <li id="backetli"><a href="../Minimarket/minimarket.php">Marketplace</a></li>
        </ul>
    </nav>

    <section aria-label="Farmer Photos">
        <div class="carousel" data-carousel>
            <button class="carousel-button prev" data-carousel-button="prev" id="arrow_left"></button>

            <button class="carousel-button next" data-carousel-button="next" id="arrow_right"></button>
            <ul data-slides>
                <li class="slide" data-active>
                    <img src="../assets/ss_i/3.jpg" alt="Farmer 1">
                </li>
                <li class="slide">
                    <img src="../assets/ss_i/1.jpg" alt="Farmer 2">
                </li>
                <li class="slide">
                    <img src="../assets/ss_i/2.jpg" alt="Farmer 3">
                </li>
                <li class="slide">
                    <img src="../assets/ss_i/4.jpg" alt="Farmer 3">
                </li>
                <li class="slide">
                    <img src="../assets/ss_i/5.jpg" alt="Farmer 3">
                </li>
                <li class="slide">
                    <img src="../assets/ss_i/6.jpg" alt="Farmer 3">
                </li>
            </ul>
        </div>
    </section>

    <main id="market_place_info">
        <h2 style="font-family: 'Times New Roman', serif; font-style: italic;"><span style="color: Green;">Green
                Basket</span>
            <span style="font-style: normal;"> - "Market Place</span>
        </h2>
        <h2> where best product meet best <span style="color:Green;">Price</span> </h2>
    </main>

    <div id="box">
        <div id="market-left">
            <div id="information">
                <h2>Market Place</h2>

                <p>
                    Welcome to our dynamic marketplace, uniquely designed to connect local farmers directly with
                    consumers who value fresh, quality produce. Our platform allows farmers to showcase their diverse
                    range of products, from vibrant fruits and vegetables to artisanal cheeses and homemade goods, all
                    sourced locally. Buyers can easily explore these offerings, enjoying the convenience of browsing
                    high-resolution images and detailed descriptions. With a focus on fair pricing, our system ensures
                    that farmers retain a larger share of their earnings, promoting sustainable farming practices and
                    supporting local economies. Seamless online transactions make it easy for customers to select their
                    favorite items, schedule deliveries, and enjoy the freshest produce available. By participating in
                    our marketplace, consumers not only enjoy nutritious food but also strengthen their connection to
                    the farming community, fostering a sustainable and healthy food ecosystem.
                </p>
            </div>

            <div id="button">
                <button class="p-button"><a href="../Marketplace/marketplace.php">Marketplace</a></button>
            </div>


        </div>


        <div id="market-right">
            <div class="card">
                <img src="../assets/m_img/39.jpg" alt="">
                <div class="card-content">
                    <h2>
                        Products
                    </h2>
                    <p>

                    </p>
                    <a href="#" class="button">
                    <ul style="margin-bottom: 20px" id="li">
                            <li>Machinery</li>
                            <li>Farming Tool</li>
                            <li>Seeds</li>
                            <li>Fertilizers</li>
                            <li>Persticides</li>
                        </ul>
                        <span class="material-symbols-outlined">

                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <main>
        <h2 style="font-family: 'Times New Roman', serif; font-style: italic;"><span style="color:green;">Green
                Basket</span>
            <span style="font-style: normal;"> - "Supporting Farmers</span>
        </h2>
        <h2> Feeding Communities, and Giving </h2>
        <h2> Hope to Those in Need!" </h2>
    </main>

    <div id="box">
        <div id="market-right">
            <div class="card">
                <img src="../assets/donation.webp" alt="">
                <div class="card-content">
                    <h2>
                        Donation
                    </h2>
                    <p>

                    </p>
                    <a href="#" class="button">
                        We provide money for the people in need

                    </a>
                </div>
            </div>
        </div>

        <div id="market-left">
            <div id="information">
                <h2 style="text-align:right">Donation</h2>

                <p>
                    <!-- Add some information in this -->
                    Alongside our marketplace, we proudly offer a dedicated donation service to support farmers who face
                    difficulties due to unforeseen challenges like crop failures, natural disasters, or economic
                    hardships. This program enables customers to make meaningful contributions that help sustain the
                    livelihoods of local farmers. With a simple, secure donation process, users can choose any amount to
                    donate, knowing that every dollar goes directly to assist those in need. We organize regular
                    fundraising campaigns, creating opportunities for customers to engage with the agricultural
                    community, learn about the challenges farmers face, and make a positive impact. By participating in
                    this initiative, customers help build resilience within the farming sector while ensuring that
                    quality food production continues in their communities. Together, we can empower farmers, promote
                    local agriculture, and nurture a compassionate food system that benefits everyone involved.
                </p>
            </div>

            <div id="button">
                <button class="p-button"><a href="../Donation/donation.php">Donate Now</a></button>
            </div>


        </div>


    </div>

    <div id="vision_block">
        <div id="vision_info">
            <h1 id="vision_heading">
                Our Vision
            </h1>
            <p id="vision_text">
            <p style="font-size: 25px;">To build a future where agriculture thrives with dignity, transparency, and innovation.</p>
            <br>
            <p style="font-size: 25px;">
                <b>Green <span style="color:Green; ">Basket</span></b> envisions a digital-first agricultural economy where:
            </p>

            <ul style="margin-bottom:20px; font-size:25px; ">
                <li style="margin-left:60px; ">Farmers and sellers are fairly rewarded for their efforts.

                </li style="margin-left:60px; ">
                <li style="margin-left:60px; ">Customers get access to fresh, reliable, and sustainable products.

                </li>
                <li style="margin-left:60px; ">Communities grow together through collaborative support and donation.
                </li>
            </ul>

           <p style="font-size: 25px;">
           We aim to bridge rural and urban needs by creating value for every participant in the supply chain,
            while ensuring environmental sustainability and economic growth.

           </p>
            </p>
        </div>

        <div id="invi">

        </div>
    </div>
    <div id="vision_block">
        <div id="invi">

        </div>

        <div id="vision_photos">
            <h1 id="vision_heading">
                About us
            </h1>
            <p id="vision_text">
                <p style="font-size:25px">
                Welcome to Green Basket, your one-stop digital marketplace connecting farmers, agricultural sellers, and
                eco-conscious consumers. We are on a mission to transform how agricultural goods are exchanged by
                creating a transparent, supportive, and sustainable ecosystem for everyone involved in the agri-value
                chain. Whether you're a farmer, seller, or donor, Green Basket is here to empower you with access,
                choice, and trust.
                </p>
                <br>

                <p style="font-size:25px; ">
                At our core, we believe in technology as a tool for empowerment—making local produce and agri-essentials
                accessible across the country, while also supporting communities through our donation programs.
                </p>
            </p>
        </div>
    </div>


    <div id="creator_heading">Developer</div>
    <div id="creators">

        <div id="creator" class="drop_img">
            <div id="image">
                <img src="../assets/person/shah1.jpg" alt="">
            </div>
            <div id="details">
                <div id="name">
                    <h2>Palak Shah</h2>

                </div>
            </div>
        </div>

        <div id="creator">
            <div id="image">
                <img src="../assets/person/patil1.jpg" alt="">
            </div>
            <div id="details">
                <h2>Pratik Patil</h2>

            </div>
        </div>

        <div id="creator" class="drop_img">
            <div id="image">
                <img src="../assets/person/Palav1.jpg" alt="">
            </div>
            <div id="details">
                <h2>Parth Palav</h2>

            </div>
        </div>

    </div>

    <footer>
        <section class="footer">
            <div class="footer-row">
                <div class="footer-col">
                    <h4>Info</h4>
                    <ul class="links">
                        <li>About Us</li>
                        <li>Compressions</li>
                        <li>Customers</li>
                        <li>Service</li>
                        <li>>History</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Explore</h4>
                    <ul class="links">
                        <li>Marketplace</li>
                        <li>Donation</li>
                        <li>Profile</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Legal</h4>
                    <ul class="links">
                        <li>Customer Agreement</li>
                        <li>Privacy Policy</li>
                        <li>GDPR</li>
                        <li>Security</li>
                        <li>Testimonials</li>
                    </ul>
                </div>
            </div>
            </div>
        </section>
    </footer>

    <script>
        // For Image slideshow
        const buttons = document.querySelectorAll("[data-carousel-button]");

        buttons.forEach(button => {
            button.addEventListener("click", () => {
                const offset = button.dataset.carouselButton === "next" ? 1 : -1;
                const slides = button.closest("[data-carousel]").querySelector("[data-slides]");
                const activeSlide = slides.querySelector("[data-active]");
                let newIndex = [...slides.children].indexOf(activeSlide) + offset;

                if (newIndex < 0) newIndex = slides.children.length - 1;
                if (newIndex >= slides.children.length) newIndex = 0;

                slides.children[newIndex].dataset.active = true;
                delete activeSlide.dataset.active;
            });
        });

        //For changeing 
        window.addEventListener("load", init);

        function init() {
            const img = document.querySelector("img");
            const {
                width
            } = img.getBoundingClientRect();
            const halfImgWidth = width / 2;
            img.addEventListener("mousemove", function (e) {
                const xPos = e.pageX - img.offsetLeft;
                this.classList.remove("cursor-prev", "cursor-next");
                if (xPos > halfImgWidth) {
                    this.classList.add("cursor-next");
                } else {
                    this.classList.add("cursor-prev");
                }
            });
        }
    </script>

</body>

</html>