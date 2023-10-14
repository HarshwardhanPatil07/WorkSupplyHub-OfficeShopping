<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Display+Playfair:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


  <title>Office shop</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      box-sizing: border-box;
    }

    .banner {
      width: 100%;
      height: 100vh;
      background-image: linear-gradient(rgba(0, 0, 0, 0.40), rgba(0, 0, 0, 0.40));
      background-position: center;
      background-size: center;
    }

    .navbar {
      width: 90%;
      padding: 30px;
      margin: auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .logo {
      width: 160px;
      margin-top: -10px;
      cursor: pointer;
    }

    .navbar ul li {
      list-style: none;
      display: inline-block;
      margin: 20px;
    }

    .navbar ul li a {
      text-decoration: none;
      text-transform: uppercase;
      color: white;
      font-weight: 600;
      padding: 15px;
    }

    li a:hover {
      background: white;
      transition: 0.5s;
    }

    .navbar a:hover {
      color: black;
    }

    .content {
      width: 100%;
      position: absolute;
      color: white;
      top: 45%;
      transform: translateY(-50%);
      text-align: center;
    }

    .content h1 {
      margin-top: 80px;
      font-size: 90px;
      font-weight: 800;
    }

    button {
      width: 200px;
      padding: 15px;
      margin: 20px 5px;
      text-align: center;
      border-radius: 25px;
      color: black;
      border: 2px;
      font-size: 20px;
      cursor: pointer;
      font-weight: 600;
    }

    button:hover {
      background: rgb(0, 192, 226);
      transition: 0.5s;
    }

    button:hover {
      color: white;
    }

    .banner video {
      position: absolute;
      right: 0;
      bottom: 0;
      z-index: -1;

    }

    @media(min-aspect-ratio: 16/9) {
      .banner video {
        width: 100%;
        height: auto;
      }
    }

    /* Inline CSS for styling */
    body {
      font-family: Arial, sans-serif;
    }

    .untree_co-section {
      background-color: #f9f9f9;
      padding: 50px 0;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .col-lg-5 {
      flex-basis: calc(50% - 15px);
    }

    .col-lg-6 {
      flex-basis: calc(50% - 15px);
    }

    h2 {
      font-size: 24px;
      margin-bottom: 20px;
      border-bottom: 2px solid #333;
      padding-bottom: 10px;
    }

    p {
      font-size: 16px;
      line-height: 1.6;
    }

    /* ul {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    ul li {
      padding-left: 20px;
      position: relative;
      margin-bottom: 10px;
    }

    ul li::before {
      content: '\2022';
      position: absolute;
      left: 0;
      color: #333;
    } */
    .ul-check li {
      list-style-type: none;
      /* Remove the default black dot */
      position: relative;
      padding-left: 20px;
      /* Adjust the padding as needed */
    }

    .ul-check li:before {
      content: "\2713";
      /* Unicode checkmark character */
      position: absolute;
      left: 0;
      color: #136ad5;
      /* Blue color */
    }

    .counter {
      font-size: 36px;
      font-weight: bold;
      color: #333;
      margin-bottom: 10px;
    }

    .caption-2 {
      font-size: 16px;
      color: #777;
    }

    /* .btn {
      display: inline-block;
      padding: 10px 20px;
      margin-right: 10px;
      font-size: 16px;
      text-align: center;
      text-decoration: none;
      border: none;
      border-radius: 5px;
    }

    .btn.btn-primary {
      background-color: #007BFF;
      color: #fff;
    }

    .btn.btn-outline-primary {
      background-color: transparent;
      border: 2px solid #007BFF;
      color: #007BFF;
    } */

    .btn {
      display: inline-block;
      padding: 10px 20px;
      margin-right: 10px;
      font-size: 16px;
      text-align: center;
      text-decoration: none;
      border: none;
      border-radius: 5px;
      overflow: hidden;
      /* Add overflow:hidden to contain the sparkling effect */
      position: relative;
      /* Position for pseudo-element */
      transition: background-color 0.3s, transform 0.3s;
    }

    .btn.btn-primary {
      background-color: #007BFF;
      color: #fff;
    }

    .btn.btn-outline-primary {
      background-color: transparent;
      border: 2px solid #007BFF;
      color: #007BFF;
    }

    /* Sparkling effect */
    .btn::before {
      content: "";
      position: absolute;
      top: -100%;
      left: -100%;
      width: 300%;
      height: 300%;
      background: radial-gradient(circle, rgba(255, 255, 255, 0) 10%, rgba(255, 255, 255, 0.3) 40%, rgba(255, 255, 255, 0) 70%);
      animation: sparkle 1.5s linear infinite;
      pointer-events: none;
    }

    /* Animation keyframes for sparkling effect */
    @keyframes sparkle {
      0% {
        transform: translate(-50%, -50%) scale(0.5);
        opacity: 0;
      }

      100% {
        transform: translate(-50%, -50%) scale(2);
        opacity: 1;
      }
    }

    /* Hover effect */
    .btn:hover {
      background-color: #104fff;
      /* Change the background color on hover */
      transform: scale(1.1);
      /* Add a slight scale effect on hover */
      color: #fff;
    }


    .video-wrap {
      display: block;
      position: relative;
    }

    .play-wrap {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: rgba(0, 0, 0, 0.6);
      border-radius: 50%;
      padding: 20px;
    }

    .play-wrap .icon-play {
      font-size: 36px;
      color: #fff;
    }



    #brand-image {
      float: right;
      /* Float the image to the right */
      margin-left: 20px;
      /* Add some spacing between the content and the image */
      max-width: 100%;
      /* Ensure the image doesn't exceed its container's width */
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header id="header">

    <div class="banner">
      <video autoplay loop muted plays-inline>
        <source src="office_vid.mp4" type="video/mp4">
      </video>
      <div class="content">
        <h1>EXPLORE THE OFFICE</h1>
      </div>
    </div>
    <nav>
      <a href="#" class="logo">
        <img src="https://img.icons8.com/bubbles/452/office.png" class="icon_office" alt="Logo image">
      </a>

      <div class="burger">
        <span class="spn1"></span>
        <span class="spn2"></span>
        <span class="spn3"></span>
      </div>

      <ul class="fullSize">
        <li><a href="index.php">Home</a></li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="about.html">About us</a></li>
        <li><a href="service.html">Service</a></li>
        <li><a href="contact.html">Contact Us</a></li>
      </ul>
      <div>
        <?php
        if (isset($_SESSION['show']) && $_SESSION['show']) {
          echo '<i class="fa-solid fa-cart-shopping fa-2xl" style="margin: 10px; cursor: pointer;"></i>
                <a href="./logout.php" style="text-decoration: none; color: black;" title="logout">
                <i class="fa-solid fa-right-from-bracket fa-2xl" style="margin: 10px; cursor: pointer;"></i></a>';
        } else {
          echo '<a href="./login.php" style="text-decoration: none; color: black;" title="login">
        <i class="fa-regular fa-user fa-2xl" style="margin: 10px; cursor: pointer;"></i></a>';
        }
        ?>
      </div>
    </nav>
  </header>
  <main class="wrapper">
    <section id="branding">
      <div class="branding-wrapper">
        <div class="untree_co-section">
          <div class="container">
            <div class="row justify-content-between">
              <div class="col-lg-5 mb-5">
                <h2 class="line-bottom mb-4" data-aos="fade-up" data-aos-delay="0">No. 1 Quality Brand</h2>
                <p data-aos="fade-up" data-aos-delay="100">Welcome to Office, your trusted leader in the market since 2020.
                  With nearly two decades of unparalleled expertise, we continue to set the industry standard for excellence, innovation, and customer satisfaction.
                  Explore our website to discover why we've remained at the forefront of our field for so long.</p>
                <ul class="list-unstyled ul-check mb-5 primary" data-aos="fade-up" data-aos-delay="200">
                  <li>Assured Products</li>
                  <li>Hassle-Free Service</li>
                  <li>Get Products delivered within 2 Days</li>
                </ul>

                <div class="row count-numbers mb-5">
                  <div class="col-4 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <span class="counter d-block" id="happy-customers" data-count="19999">0</span>
                    <span class="caption-2">Happy Customers</span>
                  </div>
                  <div class="col-4 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <span class="counter d-block" id="companies-associated" data-count="49">0</span>
                    <span class="caption-2">Companies Associated</span>
                  </div>
                  <div class="col-4 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <span class="counter d-block" id="countries" data-count="12">0</span>
                    <span class="caption-2">Countries</span>
                  </div>
                </div>

                <p data-aos="fade-up" data-aos-delay="300">
                  <a href="#" class="btn btn-primary mr-1">Join Us</a>
                  <a href="#" class="btn btn-outline-primary">Learn More</a>
                </p>
              </div>
              <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-1">
                  <img src="office_start.jpg" alt="Image" class="img-fluid rounded" id="brand-image">
                </div>
              </div>
            </div>
          </div>

          <section id="shop">
            <h2>Top Grossing Products</h2>
            <div class="products">
              <div class="product-card">
                <div class="product-image-wrapper">
                  <img src="https://cdn.pixabay.com/photo/2010/12/13/10/00/attach-2092__340.jpg" alt="paper clips" class="product-img">
                </div>
                <h3 class="product-name">Paper Clips</h3>
                <h4 class="product-price">13.50</h4>
                <button class="product-add" data-action="ADD_TO_CART">Add to cart</button>
              </div>
              <div class="product-card">
                <div class="product-image-wrapper">
                  <img src="https://cdn.pixabay.com/photo/2010/12/13/10/12/stapler-2479_960_720.jpg" alt="stapler" class="product-img">
                </div>
                <h3 class="product-name">Staplers</h3>
                <h4 class="product-price">20.02</h4>
                <button class="product-add" data-action="ADD_TO_CART">Add to cart</button>
              </div>
              <div class="product-card">
                <div class="product-image-wrapper">
                  <img src="https://cdn.pixabay.com/photo/2012/02/22/19/31/binder-15454_960_720.jpg" alt="paper clips 2" class="product-img">
                </div>
                <h3 class="product-name">Paper clips</h3>
                <h4 class="product-price">10.00</h4>
                <button class="product-add" data-action="ADD_TO_CART">Add to cart</button>
              </div>
              <div class="product-card">
                <div class="product-image-wrapper">
                  <img src="https://cdn.pixabay.com/photo/2017/01/11/01/18/the-ruler-1970655_960_720.png" alt="rulers" class="product-img">
                </div>
                <h3 class="product-name">Rulers</h3>
                <h4 class="product-price">10.00</h4>
                <button class="product-add" data-action="ADD_TO_CART">Add to cart</button>
              </div>
              <div class="product-card">
                <div class="product-image-wrapper">
                  <img src="https://cdn.pixabay.com/photo/2018/01/10/17/30/scissors-3074340_960_720.jpg" alt="scissors" class="product-img">
                </div>
                <h3 class="product-name">Scissors</h3>
                <h4 class="product-price">15.00</h4>
                <button class="product-add" data-action="ADD_TO_CART">Add to cart</button>
              </div>
              <div class="product-card">
                <div class="product-image-wrapper">
                  <img src="https://cdn.pixabay.com/photo/2017/09/18/10/22/consulting-2761233_960_720.png" alt="binders" class="product-img">
                </div>
                <h3 class="product-name">Binders</h3>
                <h4 class="product-price">12.00</h4>
                <button class="product-add" data-action="ADD_TO_CART">Add to cart</button>
              </div>
              <div class="product-card">
                <div class="product-image-wrapper">
                  <img src="https://cdn.pixabay.com/photo/2016/03/24/16/06/binder-1277031_960_720.jpg" alt="notebooks" class="product-img">
                </div>
                <h3 class="product-name">Note books</h3>
                <h4 class="product-price">25.00</h4>
                <button class="product-add" data-action="ADD_TO_CART">Add to cart</button>
              </div>
              <div class="product-card">
                <div class="product-image-wrapper">
                  <img src="https://cdn.pixabay.com/photo/2013/07/28/14/07/calculator-168360_960_720.jpg" alt="calculators" class="product-img">
                </div>
                <h3 class="product-name">Calculators</h3>
                <h4 class="product-price">40.00</h4>
                <button class="product-add" data-action="ADD_TO_CART">Add to cart</button>
              </div>
              <div class="product-card">
                <div class="product-image-wrapper">
                  <img src="https://cdn.pixabay.com/photo/2013/08/03/18/43/postit-169631_960_720.jpg" alt="sticky notes" class="product-img">
                </div>
                <h3 class="product-name">Sticky notes</h3>
                <h4 class="product-price">8.00</h4>
                <button class="product-add" data-action="ADD_TO_CART">Add to cart</button>
              </div>
            </div>
          </section>
          <?php
          if (isset($_SESSION['show']) && $_SESSION['show']) {
            echo '<div class="cart-container" id="basket">
                  <h2 class="text-center">Cart</h2>
                  <div class="cart"></div>
                  </div>';
          }
          ?>
          <section class="about" id="about">
            <h2>They wrote about us...</h2>
            <img id="heart" src="https://www.freeiconspng.com/uploads/heart-png-26.png" alt="heart logo">
            <div class="content-slider">
              <div class="slider">
                <div class="mask">
                  <ul>
                    <li class="anim1">
                      <div class="quote">Fast shipping, nice service.</div>
                      <div class="source">Harshwardhan, USA</div>
                    </li>
                    <li class="anim2">
                      <div class="quote">Hello, I just wanna say thank you for nice service.</div>
                      <div class="source">Aditya, Belgium</div>
                    </li>
                    <li class="anim3">
                      <div class="quote">Hope to see you soon, hope to work with you again!</div>
                      <div class="source">Shyam, Poland</div>
                    </li>
                    <li class="anim4">
                      <div class="quote">Best company I have ever worked with.</div>
                      <div class="source">Ameya, Ukraine</div>
                    </li>
                    <li class="anim5">
                      <div class="quote">Best regards from South Korea, It was pleasure to cooperate with you!</div>
                      <div class="source">Darshan, S.Korea</div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </section>
          <section id="service">
            <div class="service-wrapper">
              <h2>Who we are and what do we do</h2>
              <div class="circle"></div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis adipisci necessitatibus, eum fugiat earum obcaecati autem placeat ipsa magnam iusto quia tenetur? Dolores provident esse natus libero, voluptas magnam, dolor deleniti ipsa cum blanditiis. Consectetur cumque laboriosam atque natus eos, excepturi nam a doloribus unde asperiores corporis officiis incidunt, enim sed, quia debitis provident suscipit, vero illo perspiciatis rerum deserunt repudiandae. Voluptate doloribus eos quibusdam sit itaque pariatur cumque assumenda quidem sint possimus dolorem praesentium magnam, aliquam deserunt, adipisci autem reiciendis voluptatibus nostrum error architecto placeat alias nihil ex vel suscipit. Consectetur reiciendis incidunt voluptate excepturi, qui doloremque saepe dolorum.
                <hr>
              </p>
            </div>
            <div class="service-grid">
              <div class="service-card">
                <i class="fa-solid fa-thumbs-up"></i>
                <h4>Over 200 happy customers</h4>
              </div>
              <div class="service-card">
                <i class="fa-solid fa-truck-fast"></i>
                <h4>100% safe shipping</h4>
              </div>
              <div class="service-card">
                <i class="fa-solid fa-globe"></i>
                <h4>Over 50 countries served</h4>
              </div>
              <div class="service-card">
                <i class="fa-solid fa-scale-balanced"></i>
                <h4>Over 11 years in industry</h4>
              </div>
            </div>
          </section>



  </main>
  <footer id="footer">
    <div class="column">
      <h3>Shortly about Us...</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, non sapiente at quas enim aliquid, architecto aperiam, dicta est nisi cum sed alias incidunt illum sequi praesentium. Totam, praesentium at?</p>
    </div>
    <div class="column">
      <h3><i class="fa-solid fa-house-chimney"></i>Address</h3>
      <ul>
        <li>VISHWAKARMA INSTITUTE OF TECHNOLOGY</li>
        <li>Upper Indira Nagar,</li>
        <li>Bibwewadi, Pune,</li>
        <li>India</li>
        <li>Contact: 9420205009</li>
      </ul>
    </div>
    <div class="column">
      <h3>Social media</h3>
      <ul>
        <li><a href="#"><i class="fa-brands fa-facebook-square"></i>Facebbok</a></li>
        <li><a href="#"><i class="fa-brands fa-instagram-square"></i>Instagram</a></li>
        <li><a href="#"><i class="fa-brands fa-twitter-square"></i>Twitter</a></li>
        <li><a href="#"><i class="fa-brands fa-youtube-square"></i>YouTube</a></li>
      </ul>
    </div>
    <div class="column">
      <h3>Wanna be up to date!</h3>
      <p>Join out newsletter</p>
      <input type="email" placeholder="harshwardhan.patil22@vit.edu" />
      <button>Subscribe</button>
    </div>




  </footer>
  <p class="bottomfooter">Coded with <i class="fa-solid fa-heart"></i> by Group-5</a></p>
  <script src="scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body>

</html>