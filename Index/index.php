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
            <li><a href="../Login/login.php">Login/SignUp</a></li>
            <li><a href="../Donation/donation.php">Donation</a></li>
            <li><a href="../Myprofile/myprofile.php">My Profie</a></li>
            <li id="backetli"><a href="../Minimarket/minimarket.php ">Marketplace</a></li>
        </ul>
    </nav>

    <section aria-label="Farmer Photos">
        <div class="carousel" data-carousel>
            <button class="carousel-button prev" data-carousel-button="prev" id="arrow_left"></button>

            <button class="carousel-button next" data-carousel-button="next" id="arrow_right"></button>
            <ul data-slides>
                <li class="slide" data-active>
                    <img src="../assets/slideshow/farm1.jpg" alt="Farmer 1">
                </li>
                <li class="slide">
                    <img src="../assets/slideshow/farm2.jpg" alt="Farmer 2">
                </li>
                <li class="slide">
                    <img src="../assets/slideshow/farm3.jpg" alt="Farmer 3">
                </li>
                <li class="slide">
                    <img src="../assets/slideshow/farm4.jpg" alt="Farmer 4">
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
                    <!-- Add some information in this -->
                </p>
            </div>

            <div id="button">
                <button class="market-button"><a href="../Marketplace/marketplace.php">Marketplace</a></button>
            </div>


        </div>


        <div id="market-right">
            <div class="card">
                <img src="../assets/index_pg_tool/image2.jpeg" alt="">
                <div class="card-content">
                    <h2>
                        Card Heading
                    </h2>
                    <p>

                    </p>
                    <a href="#" class="button">
                        Find out more
                        <span class="material-symbols-outlined">
                            arrow_right_alt
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>



    <main>
        <h2 style="font-family: 'Times New Roman', serif; font-style: italic;">Green Basket
            <span style="font-style: normal;"> - "Supporting Farmers</span>
        </h2>
        <h2> Feeding Communities, and Giving </h2>
        <h2> Hope to Those in Need!" </h2>
    </main>

    <div id="box">
        <div id="market-right">
            <div class="card">
                <img src="../assets/index_pg_tool/donation.webp" alt="">
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
                At Green Basket, we envision a world where sustainable agriculture and compassionate giving come
                together to uplift communities. Our goal is to create an inclusive platform where farmers can
                thrive,
                affordable food reaches those in need, and donors can make a direct impact on people's lives.
                We believe in: 🌱 Empowering Farmers – Providing a fair marketplace for small-scale farmers to sell
                their produce directly to consumers. 🍽️ Ending Hunger – Ensuring that every individual, especially
                the
                underprivileged, has access to nutritious food. ❤️ Building a Giving Community – Encouraging
                donations
                of food and resources to support those in need. 🌍 Sustainable Growth – Promoting environmentally
                friendly practices that support long-term agricultural success.
                Through innovation, transparency, and social responsibility, we are committed to transforming lives,
                one
                basket at a time. 🚀
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
                Our Vision
            </h1>
            <p id="vision_text">
                At Green Basket, we envision a world where sustainable agriculture and compassionate giving come
                together to uplift communities. Our goal is to create an inclusive platform where farmers can
                thrive,
                affordable food reaches those in need, and donors can make a direct impact on people's lives.
                We believe in: 🌱 Empowering Farmers – Providing a fair marketplace for small-scale farmers to sell
                their produce directly to consumers. 🍽️ Ending Hunger – Ensuring that every individual, especially
                the
                underprivileged, has access to nutritious food. ❤️ Building a Giving Community – Encouraging
                donations
                of food and resources to support those in need. 🌍 Sustainable Growth – Promoting environmentally
                friendly practices that support long-term agricultural success.
                Through innovation, transparency, and social responsibility, we are committed to transforming lives,
                one
                basket at a time. 🚀
            </p>
        </div>
    </div>


    <div id="creator_heading">Developer</div>
    <div id="creators">

        <div id="creator" class="drop_img">
            <div id="image">
                <img src="../assets/person/shah.jpg"
                    alt="">
            </div>
            <div id="details">
                <div id="name">
                    <h2>Palak Shah</h2>
                    <h3>Database</h3>
                </div>
            </div>
        </div>

        <div id="creator">
            <div id="image">
                <img src="../assets/person/patil.jpg"
                    alt="">
            </div>
            <div id="details">
                <h2>Pratik Patil</h2>
                <h3>Frontend</h3>
            </div>
        </div>

        <div id="creator" class="drop_img">
            <div id="image">
                <img src="../assets/person/Palav.jpg"
                    alt="">
            </div>
            <div id="details">
                <h2>Parth Palav</h2>
                <h3>Backend</h3>
            </div>
        </div>

    </div>

    <footer>

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
            const { width } = img.getBoundingClientRect();
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