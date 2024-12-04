<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>YumZy - Food & Beverages</title>
  <link rel="icon" type="image/png" href="./assets/images/yumzy-icon.png" />
  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <!--Custom CSS-->
  <link rel="stylesheet" href="./assets/css/index.css" />
  <!--Google font-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Ballet:opsz@16..72&family=Cedarville+Cursive&family=Cookie&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Smooch&display=swap"
    rel="stylesheet" />
  <!--Icons -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <!-- Add Axios CDN -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <!-- jQuery-->
  <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    crossorigin="anonymous"></script>
  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="font-family: 'lato', sans-serif; background: none; height: 100%">
  <!-- Navbar -->
  <?php include 'header.php'; ?>

  <!--Welcome section-->
  <!-- Create an array with section data -->
  <?php
  $carouselItems = [
    ['image' => './assets/images/bg1.jpg', 'subHeading' => 'Delicious Meals', 'description' => 'Freshly prepared, right to your door.'],
    ['image' => './assets/images/bg2.jpg', 'subHeading' => 'Satisfy Your Cravings', 'description' => 'Discover a variety of flavors.'],
    ['image' => './assets/images/bg3.jpg', 'subHeading' => 'Quality Ingredients', 'description' => 'For meals that make you feel good.'],
  ];
  ?>

<!-- Create carousel and access array data -->
<div
    id="yumzyCarousel"
    class="carousel slide carousel-fade"
    data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php foreach($carouselItems as $index => $item):?>
      <div class="carousel-item <?php echo $index==0 ? 'active': ''; ?>">
        <img
          src="<?php echo $item['image'];?>"
          class="d-block w-100 zoom-image"
          alt="welcome-image1" />
        <div class="carousel-caption">
          <h2>Welcome To</h2>
          <h1>YumZy</h1>
          <h5><?php echo $item['subHeading'];?></h5>
          <p><?php echo $item['description'];?></p>
          <br />
          <p style="font-family: 'Caveat', cursive; margin-top: 50px">
            your go-to spot for delicious meals and treats delivered with
            ease! Craving something specific? Dive into our menu, featuring
            everything from sizzling pizzas to satisfy your cheesy cravings,
            to indulgent cakes for that sweet fix, and refreshing beverages to
            quench your thirst. With Yumzy, you’ll find top-quality flavors
            crafted from the freshest ingredients, all available with just a
            few clicks. Our fast delivery ensures your meal arrives hot and
            fresh, ready to enjoy anytime. Treat yourself today and let Yumzy
            make every meal moment unforgettable!
          </p>
        </div>
      </div>
      <?php endforeach;?>
    </div>         

    <button
      class="carousel-control-prev"
      type="button"
      data-bs-target="#yumzyCarousel"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="carousel-control-next"
      type="button"
      data-bs-target="#yumzyCarousel"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Feature Section -->
  <?php include 'feature-section.php'; ?>
  <?php renderFeatureSection(); ?>

  <!--About section-->
  <section class="about-section">
    <div class="container" id="about">
      <div class="row">
        <!-- Left side images with unordered layout -->
        <div class="col-md-6 about-images">
          <img
            src="./assets/images/about-img.webp"
            alt="Restaurant Image 1"
            class="img1" />
          <img
            src="./assets/images/bg1.jpg"
            alt="Restaurant Image 2"
            class="img2" />
          <img
            src="./assets/images/bg3.jpg"
            alt="Restaurant Image 3"
            class="img3" />
          <img
            src="./assets/images/bg2.jpg"
            alt="Restaurant Image 4"
            class="img4" />
        </div>
        <!-- Right side text -->
        <div class="col-md-6 about-text">
          <h2>Welcome to Yumzy.!</h2>
          <p>
            At Yumzy, we’re passionate about making your food experience
            effortless and enjoyable. From cheesy pizzas to mouthwatering
            cakes and refreshing beverages, our menu has something for
            everyone. With a focus on quality ingredients and exceptional
            service, we make it easy for you to order your favorite dishes and
            have them delivered right to your doorstep. Whether it’s a casual
            meal or a special celebration, Yumzy is here to satisfy your
            cravings and make every moment delicious!
          </p>
          <i
            class="fa fa-angle-double-down"
            onclick="toggleContent()"
            aria-hidden="true"
            id="readMore"></i>
        </div>
      </div>

      <!-- Additional Content to show in single column below the main content -->
      <div class="additional-content">
        <h5>Our Mission</h5>
        <p>
          At Yumzy, our mission is simple: to connect people with the food
          they love, in the easiest and most convenient way possible. We
          understand how busy life can get, and that’s why we’ve built a
          platform where great meals are just a click away. Whether you’re in
          the mood for comfort food or something sweet, we’re here to make
          your dining experience effortless and enjoyable.
        </p>

        <h5>Why Choose Us?</h5>

        <ul>
          <li>
            <strong>Wide Variety:</strong> From savory pizzas to indulgent
            cakes and thirst-quenching beverages, we offer a diverse selection
            of dishes for every taste and occasion.
          </li>
          <li>
            <strong>Quality Ingredients:</strong> We believe that great food
            starts with the best ingredients. Our meals are crafted using
            fresh, high-quality products to ensure every bite is packed with
            flavor.
          </li>
          <li>
            <strong>Easy Ordering:</strong> Our user-friendly platform allows
            you to browse, select, and order your favorite meals with ease,
            whether you’re at home or on the go.
          </li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Menu Section -->   
   <!-- An array with card data -->
  <?php
  $menuItems = [
    ['title' => 'Pizza', 'image' => './assets/images/menu-pizza.jpg', 'link' => './pizza.php'],
    ['title' => 'Cakes', 'image' => './assets/images/menu-cake.jpg', 'link' => './cake.php'],
    ['title' => 'Beverages', 'image' => './assets/images/menu-beverages.jpg', 'link' => './beverages.php'],
  ];
  ?>

  <!-- Create cards and access array -->
  <section class="our-menu">
  <div class="container" id="menu">
    <div class="menutopic text-center">
        <h2>Our Menu</h2>
    </div>
    <div class="row justify-content-center align-items-center row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3">
      <?php foreach($menuItems as $item):?>
        <div class="col d-flex justify-content-center">
          <div class="menu-card text-center" id="pizzaCard">
            <div class="card-img-container">
              <img
                src="<?php echo $item['image'];?>"
                class="card-img-top img-fluid"
                alt="<?php echo $item['title'];?>" />
            </div>
            <div class="card-body">
              <a href="<?php echo $item['link'];?>">
                <button class="btn btn-warning"><?php echo $item['title'];?></button>
              </a>
            </div>
          </div>
        </div> 
        <?php endforeach;?>   
    </div>
  </div>
  </section>

  <section class="container offer-section height-100vh">
      <div id="promotion">
        <h2 class="text-center pt-2">Special Offers</h2>

        <div
          id="offerList"
          class="d-flex flex-wrap gap-3 justify-content-center"
        ></div>
      </div>
    </section>

  <!-- Footer Section -->
  <?php include 'footer.php'; ?>

  <script src="./assets/js/promotion.js"></script>
  <script src="./assets/js/contact.js"></script>

  <script>
    //For read more content
  function toggleContent() {
    $(".additional-content").toggle();
  }
  </script>
</body>

</html>