<?php 
// footer.php
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Footer Example</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Lato", sans-serif;
        background-image: none;
        height: 100vh;
        margin: 0;
        background-size: cover;
        background-repeat: no-repeat;
      }

      .footer {
        background-color: #000000;
        color: #ffffff;
        background-size: cover;
        height: auto;
      }

      .footer-logo {
        color: #c59d5f;
        text-align: center;
        font-size: clamp(10px, 2vw, 50px);
        font-style: oblique;
        font-weight: 500;
        font-family: "cookie", cursive;
        letter-spacing: 1px;
      }

      .contact-info h5 {
        font-size: clamp(10px, 2vw, 50px);
        font-style: oblique;
        font-weight: 500;
        font-family: "cookie", cursive;
        margin: 10px 0 10px 0;
      }

      .contact-info p {
        margin: 0 0 0 0;
      }

      .footer-social-icons a {
        color: #ffffff;
        text-decoration: none;
        margin: -10px 25px 0 20px;
      }

      .footer-social-icons a:hover {
        background-color: #000000 !important;
        border-color: #000000 !important;
      }

      .footer-navbar {
        display: flex;
        flex-wrap: wrap;
      }

      .nav-item:hover {
        color: #c59d5f;
        background-color: #000000 !important;
        border-color: #000000 !important ;
      }

      .footer-navbar a {
        text-decoration: none;
        color: #ffffff;
        margin: -10px 10px 10px 0;
      }

      .footer-bottom {
        border-top: 1px solid #ffffff;
        padding: 1%;
        text-align: center;
      }

      .contact-info p[data-bs-toggle="modal"] {
        cursor: pointer;
      }

      /* contact form*/
      #contactModal .btn-secondary {
        background-color: #ffffff;
        color: #c59d5f;
        border: 3px solid #c59d5f;
      }

      #contactModal .btn-secondary:hover {
        background-color: #c59d5f;
        color: #ffffff;
        border: 3px solid #c59d5f;
      }

      #contactModal .btn-primary {
        background-color: #c59d5f;
        color: #ffffff;
        border: 3px solid #c59d5f;
      }

      #contactModal .btn-primary:hover {
        background-color: #ffffff;
        color: #c59d5f;
        border: 3px solid #c59d5f;
      }

      #contactModal {
        color: #c59d5f;
      }

      .form-group {
        margin-bottom: 5px;
      }

      /* Mobile adjustments */
      @media (max-width: 768px) {
        .footer-navbar {
          justify-content: center;
        }
        .footer .contact-info {
          text-align: center;
          padding-left: 0;
        }
      }

      @media (max-width: 576px) {
        .footer .footer-navbar a {
          font-size: 14px;
        }

        .footer .footer-social-icons a {
          font-size: 18px;
        }
      }
    </style>
  </head>
  <body>
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-12 text-center text-md-start mb-3">
            <div
              class="d-flex justify-content-center justify-content-md-start align-items-center mb-3"
            >
              <img
                src="./assets/images/yumzy.png"
                alt="Logo"
                style="width: 40px"
              />
              <h5 class="ms-3 footer-logo">Yumzy</h5>
            </div>
            <div class="footer-navbar">
              <a class="nav-item" href="./index.html">Home</a>
              <a class="nav-item" href="./#about">About Us</a>
              <a class="nav-item" href="./#menu">Menu</a>
              <a class="nav-item" href="./#carouselExampleSlidesOnly"
                >Promotion</a
              >
            </div>
            <div
              class="footer-social-icons d-flex justify-content-center justify-content-md-start mt-3"
            >
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-twitter"></i></a>
              <a href="#"><i class="bi bi-youtube"></i></a>
            </div>
          </div>
          <div
            class="col-md-6 col-sm-12 text-center text-md-start contact-info mt-4 mt-md-0"
          >
            <h5>Contact Us</h5>
            <p>Phone: +94586923568</p>
            <p data-bs-toggle="modal" data-bs-target="#contactModal">
              Email: yamzyfooddealer@gmail.com
            </p>
          </div>
        </div>

        <div class="footer-bottom">
          <p>&copy; 2024 Your YumZy . All rights reserved.</p>
        </div>
      </div>
    </footer>

    <!-- Contact Form Modal -->
    <div
      class="modal fade"
      id="contactModal"
      tabindex="-1"
      aria-labelledby="contactModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
          </div>
          <div class="modal-body">
            <form id="contactForm">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" required />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" required />
              </div>
              <div class="form-group">
                <label for="contactNumber">Contact Number</label>
                <input
                  type="text"
                  class="form-control"
                  id="contactNumber"
                  required
                />
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea
                  class="form-control"
                  id="message"
                  rows="3"
                  required
                ></textarea>
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Cancel
                </button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="assets/widgets/contact.js"></script>
  </body>
</html>
