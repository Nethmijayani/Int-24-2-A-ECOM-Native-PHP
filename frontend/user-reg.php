<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YumZy | SignUp</title>
    <link rel="icon" type="image/png" href="./assets/images/yumzy-icon.png" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet "
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />

    <link rel="stylesheet" href="./assets/css/user-reg.css" />
    <link rel="stylesheet" href="./assets/css/reg-success.css" />
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://code.jquery.com/jquery-3.7.1.min.js"
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="./assets/js/user-reg.js"></script>
  </head>

  <body>
    <div class="container-fluid">
      <div class="container col-12 col-md-8 col-xl-8 form-border">
        <h1 class="fw-bold header text-center">
          START YOUR DELICIOUS FOOD JOURNEY
        </h1>
        <div
          class="container col-12 col-sm-10 col-md-12 col-xl-8 shadow form-style"
        >
          <form
            id="registerForm"
            method="POST"
            class="needs-validation"
            novalidate
          >
            <h3 class="p-2 form-title">Sign up now!</h3>

            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email </label>
              <div class="col-sm-10 input-group">
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  placeholder="Enter your email"
                  required
                />
                <div class="invalid-feedback">Please enter your email.</div>
              </div>
            </div>

            <div class="form-group row">
              <label for="userName" class="col-sm-2 col-form-label"
                >Username</label
              >
              <div class="col-sm-10 input-group">
                <input
                  type="text"
                  class="form-control"
                  id="userName"
                  placeholder="Enter your username"
                  required
                />
                <div class="invalid-feedback">Please enter your username.</div>
              </div>
            </div>

            <div class="form-group row mb-2">
              <label for="password" class="col-sm-2 col-form-label"
                >Password</label
              >
              <div class="col-sm-10 input-group">
                <input
                  type="password"
                  class="form-control password-field"
                  id="password"
                  placeholder="Enter your password"
                  required
                />
                <div class="input-group-append">
                  <span class="input-group-text">
                    <a
                      href="#"
                      class="text-dark toggle-password"
                      data-target="#password"
                      id="toggle1"
                    >
                      <i class="fas fa-eye-slash" id="icon1"></i>
                    </a>
                  </span>
                </div>
                <div class="invalid-feedback">Please enter your password.</div>
              </div>
            </div>

            <div class="form-group row mb-2">
              <label for="confirmPassword" class="col-sm-2 col-form-label"
                >Confirm Password</label
              >
              <div class="col-sm-10 input-group">
                <input
                  type="password"
                  class="form-control password-field"
                  id="confirmPassword"
                  placeholder="Confirm your password"
                  required
                />
                <div class="input-group-append">
                  <span class="input-group-text">
                    <a
                      href="#"
                      class="text-dark toggle-password"
                      data-target="#confirmPassword"
                      id="toggle2"
                    >
                      <i class="fas fa-eye-slash" id="icon2"></i>
                    </a>
                  </span>
                </div>
                <div class="invalid-feedback">
                  Please confirm your password.
                </div>
              </div>
            </div>

            <button type="submit" class="w-100 fw-bold custom-btn">
              Signup
            </button>

            <p class="pb-1">
              Already a Member? <a href="./user-login.php">Login</a>
            </p>
          </form>
        </div>
      </div>
    </div>

    <!-- Load Modal -->
    <div id="success-modal-content"></div>
  </body>
</html>
