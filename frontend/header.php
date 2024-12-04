<?php
// header.php
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $pageTitle ?? 'YumZy'; ?></title>
    <link rel="icon" type="image/png" href="./assets/images/logo.png?v=1" />

    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <!-- Bootstrap 5 icons CDN -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
    <style>
      .navbar {
        background-color: #000000;
        height: 70px;
      }

      body {
        height: 100vh;
        background-size: cover;
        background-repeat: no-repeat;
      }

      .navbar-brand:hover {
        background-color: #000000 !important;
        border-color: #000000 !important;
      }

      .navbar-toggler {
        border: none;
        font-size: 1.25rem;
      }

      .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='%23c59d5f' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E") !important;
      }

      .nav-link {
        color: #c59d5f !important;
        font-weight: 500;
        font-size: 15px !important;
        border-color: #000000 !important;
      }

      .navbar-nav {
        margin-left: 100px;
      }

      .nav-link:hover {
        color: #ffffff !important;
        background-color: #000000 !important;
        border-color: #000000 !important;
      }
      .navbar-icons {
        display: flex;
        align-items: center;
      }
      .navbar-toggler-icon {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
      }

      .navbar-icons li {
        margin-left: 10px;
      }
      .dropdown-menu {
      background-color: #000000 !important;
      }
      .dropdown-item {
      color: #c59d5f !important;
      background-color: #000000 !important;
      }
      .dropdown-item:hover {
      color: #ffffff !important;
      background-color: #c59d5f;
      }

      /* Styling for mobile view */
      @media (max-width: 991px) {
        .navbar-icons .bi-person-add {
          display: none;
        }
      }
    </style>
  </head>
  <body style="font-family: 'Lato', sans-serif">
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand me-auto" href="./index.php">
          <img
            src="./assets/images/yumzy.png"
            alt="Logo"
            style="height: 50px"
          />
        </a>

        <div
          class="offcanvas offcanvas-end"
          tabindex="-1"
          id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel"
        >
          <div class="offcanvas-header">
            <button
              type="button"
              class="btn-close text-reset"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
              style="background-color: #c59d5f; border-radius: 50%; opacity: 1"
            ></button>
          </div>

          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="./#yumzyCarousel">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="./#about">About Us</a>
              </li>
              <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle mx-lg-2"
                href="#"
                id="menuDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Menu
              </a>
              <ul class="dropdown-menu" aria-labelledby="menuDropdown">
                <li>
                  <a class="dropdown-item" href="./pizza.php">Pizza</a>
                </li>
                <li>
                  <a class="dropdown-item" href="./cake.php">Cake</a>
                </li>
                <li>
                  <a class="dropdown-item" href="./beverages.php">Beverages</a>
                </li>
              </ul>
            </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="./#promotion">Promotion</a>
              </li>
            </ul>

            <!-- Display Add User button only in mobile view -->
            <ul class="navbar-nav d-lg-none">
              <li class="nav-item">
                <a class="nav-link" href="./user-reg.php">
                  <i class="bi bi-person-add" style="font-size: 1.5rem"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>

        <ul class="navbar-icons">
          <li class="nav-item">
            <a class="nav-link" href="./cart.php">
              <i class="bi bi-cart" style="font-size: 1.5rem"></i>
            </a>
          </li>
          <!-- Display Add User button only on larger screens -->
          <li class="nav-item d-none d-lg-block">
            <a class="nav-link" href="./user-reg.php">
              <i class="bi bi-person-add" style="font-size: 1.5rem"></i>
            </a>
          </li>
        </ul>

        <button
          class="navbar-toggler pe-1"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <!-- Bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>

    <script>
      const offcanvasNavbar = document.getElementById("offcanvasNavbar");

      // Listen for the event when offcanvas is shown
      offcanvasNavbar.addEventListener("show.bs.offcanvas", function () {
        offcanvasNavbar.style.backgroundColor = "black";
      });
    </script>
  </body>
</html>
