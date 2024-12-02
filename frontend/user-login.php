<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YumZy | Login</title>
    <link rel="icon" type="image/png" href="./assets/images/yumzy-icon.png" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
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

    <link rel="stylesheet" href="./assets/css/user-login.css" />

    <link rel="stylesheet" href="./assets/styles/log-fail.css" />

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
    <script src="./assets/js/user_login.js"></script>
  </head>

  <body>
    <div class="container-fluid">
      <div class="container col-12 col-md-8 col-xl-8 form-border">
        <h1 class="fw-bold header">READY FOR ANOTHER TASTE?</h1>
        <div class="container col-12 col-md-12 col-xl-8 form-style">
          <form
            method="POST"
            id="loginForm"
            class="needs-validation"
            novalidate
          >
            <h3 class="pb-1 form-title">Login now!</h3>

            <div class="form-group row">
              <label for="userName" class="col-sm-3 col-form-label"
                >Username</label
              >
              <div class="input-group col-sm-9">
                <input
                  type="text"
                  class="form-control"
                  id="userName"
                  placeholder="Enter your username"
                  required
                />
                <div class="invalid-feedback">Please Enter your username</div>
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-sm-3 col-form-label"
                >Password</label
              >
              <div class="input-group col-sm-9 input-password">
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  placeholder="Enter your password"
                  required
                />
                <div class="input-group-append">
                  <span class="input-group-text">
                    <a href="#" class="text-dark" id="icon-click">
                      <i class="fas fa-eye-slash text-dark" id="icon"></i>
                    </a>
                  </span>
                </div>
                <div class="invalid-feedback">Please provide your password</div>
              </div>
            </div>

            <button type="submit" class="fw-bold cus-button">Login</button>

            <p>
              Not a Member?
              <a href="./user-reg.php"> Signup </a>
            </p>
          </form>
        </div>
      </div>
    </div>

    <div id="failed-modal-container"></div>
  </body>
</html>
