
<?php 

?> 


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css" />
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

    <div>
      <div id="top">
        <div id="image">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-person-circle"
            viewBox="0 0 16 16"
          >
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
            <path
              fill-rule="evenodd"
              d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"
            />
          </svg>
        </div>
      </div>

      <div id="bottom">
        <div id="information"></div>
            <div id="info">
                <div id="block">
                    <label for="name">Name:</label>
                    <p id="name">  Pratik Patil </p>
                </div>
                <div id="block">
                    <label for="Email">Email:</label>
                    <p id="Email">  pp#@nasm </p>
                </div>
                <div id="block">
                    <label for="DOB">DOB:</label>
                    <p id="DOB">  123123 </p>
                </div>
                <div id="block">
                    <label for="Pno">Phone number:</label>
                    <p id="Pno">  123123123 </p>
                </div>
                <div id="block">
                    <label for="add">Address:</label>
                    <p id="add">  Pratik Patil </p>
                </div>
                <div id="block">
                    <label for="Role">Role:</label>
                    <p id="Role">  Pratik Patil </p>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
