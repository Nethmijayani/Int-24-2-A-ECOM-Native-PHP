<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YumZy - Cakes</title>
    <link rel="icon" type="image/png" href="./assets/images/yumzy-icon.png" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap"
      rel="stylesheet"
    />

    <!-- Add Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!--J Query-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--Custom CSS-->
    <link rel="stylesheet" href="./assets/css/card.css" />
    <link rel="stylesheet" href="./assets/css/menu-hero/beverages.css" />
  </head>

  <body style="background-image: none">
    <!-- Navbar -->
    <?php include 'header.php'; ?>

    <!-- Hero Section -->
    <div class="hero-image">
      <div class="hero-text">
        <h1>The Art of Refreshment, One Sip at a Time</h1>
        <p>Discover a World of Flavors Crafted for Your Enjoyment</p>
      </div>
    </div>

    <!--Features section-->
    <?php include 'feature-bev.php'; ?>

    <!-- Pizza Menu Section -->
    <div class="container my-5">
      <div class="row" id="beverageMenu"></div>

      <!-- buttons left and right -->
      <div class="button-container">
        <a id="viewMoreBtn" class="btn btn-secondary-next"> Next &raquo; </a>
      </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="./assets/js/feature-menu/beverages.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/widgets/contact.js"></script>
  </body>
</html>
