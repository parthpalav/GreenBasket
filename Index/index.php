<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel = "stylesheet" href = "index_style.css">
</head>
<body>
    <nav id="navbar">
    <ul>
        <li class="home-li"><a href="index.html">Green Basket</a></li>
        <li><a href="../Login/login.php">Login/SignUp</a></li>
        <li><a href="../Donation/donation.php">Donation</a></li>
        <li><a href="../Myprofile/myprofile.php">My Profie</a></li>
        <li><a href="../Basket/basket.php ">Basket</a></li>
    </ul>
    </nav>

    <section aria-label = "Farmer Photos">
        <div class="carousel" data-carousel>
        <button class="carousel-button prev" data-carousel-button="prev">&#8656;</button>
        <button class="carousel-button next" data-carousel-button="next">&#8658;</button>
            <ul data-slides>
                <li class = "slide" data-active>
                    <img src = "../assets/farm1.jpg" alt = "Farmer 1">
                </li>
                <li class = "slide">
                    <img src = "../assets/farm2.jpg" alt = "Farmer 2">
                </li>
                <li class = "slide">
                    <img src = "../assets/farm3.jpg" alt = "Farmer 3">
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
        <button class="donate-button"><a href="donation.php">Donate Now</a></button>
        <button class="market-button"><a href="market.php">Marketplace</a></button>
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