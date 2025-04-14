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
            <li><a href="../Basket/basket.php ">Basket</a></li>
        </ul>
    </nav>

    <section aria-label="Farmer Photos">
        <div class="carousel" data-carousel>
            <button class="carousel-button prev" data-carousel-button="prev">&#8656;</button>
            <button class="carousel-button next" data-carousel-button="next">&#8658;</button>
            <ul data-slides>
                <li class="slide" data-active>
                    <img src="../assets/farm1.jpg" alt="Farmer 1">
                </li>
                <li class="slide">
                    <img src="../assets/farm2.jpg" alt="Farmer 2">
                </li>
                <li class="slide">
                    <img src="../assets/farm3.jpg" alt="Farmer 3">
                </li>
                <li class="slide">
                    <img src="../assets/farm4.jpg" alt="Farmer 4">
                </li>
            </ul>
        </div>
    </section>

    <main>
        <h2 style="font-family: 'Times New Roman', serif; font-style: italic;">Green Basket
            <span style="font-style: normal;"> - "Supporting Farmers</span>
        </h2>
        <h2> Feeding Communities, and Giving </h2>
        <h2> Hope to Those in Need!" </h2>
    </main>

    <div class="button-container">
        <button class="donate-button"><a href="../Donation/donation.php">Donate Now</a></button>
        <button class="market-button"><a href="../Marketplace/marketplace.php">Marketplace</a></button>
    </div>

    <div id="vision_block">
        <div id="vision_info">
            <h1 id="vision_heading">
                Our Vision
            </h1>
            <p id="vision_text">
                At Green Basket, we envision a world where sustainable agriculture and compassionate giving come
                together to uplift communities. Our goal is to create an inclusive platform where farmers can thrive,
                affordable food reaches those in need, and donors can make a direct impact on people's lives.
                We believe in: 🌱 Empowering Farmers – Providing a fair marketplace for small-scale farmers to sell
                their produce directly to consumers. 🍽️ Ending Hunger – Ensuring that every individual, especially the
                underprivileged, has access to nutritious food. ❤️ Building a Giving Community – Encouraging donations
                of food and resources to support those in need. 🌍 Sustainable Growth – Promoting environmentally
                friendly practices that support long-term agricultural success.
                Through innovation, transparency, and social responsibility, we are committed to transforming lives, one
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
                together to uplift communities. Our goal is to create an inclusive platform where farmers can thrive,
                affordable food reaches those in need, and donors can make a direct impact on people's lives.
                We believe in: 🌱 Empowering Farmers – Providing a fair marketplace for small-scale farmers to sell
                their produce directly to consumers. 🍽️ Ending Hunger – Ensuring that every individual, especially the
                underprivileged, has access to nutritious food. ❤️ Building a Giving Community – Encouraging donations
                of food and resources to support those in need. 🌍 Sustainable Growth – Promoting environmentally
                friendly practices that support long-term agricultural success.
                Through innovation, transparency, and social responsibility, we are committed to transforming lives, one
                basket at a time. 🚀
            </p>
        </div>
    </div>

    </div>

    <footer>
        <p>Contact Us: <br> Palak Shah <br> Parth Palav <br> Pratik Patil
    </footer>

    <script>
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
    </script>

</body>

</html>