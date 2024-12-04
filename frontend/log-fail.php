<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Fail</title>
    <!--Bootstrap CSS-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />

    <!--Google font-->
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="./assets/styles/log-fail.css" />

    <!-- jQuery-->
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      crossorigin="anonymous"
    ></script>
    <!-- Popper.js and Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body style="font-family: 'Lato', sans-serif">
    <!--Login Fail Popup Message-->
    <div
      class="modal fade"
      id="failModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content text-center p-5">
          <img
            src="./assets/images/error-close-img.png"
            class="img-fluid my-3"
            alt="login-fail"
          />
          <h2 class="fail-title">Invalid details</h2>
          <p class="message">Your Details has been invalided</p>
          <a href="./user-login.php" class="btn btn-md mt-2">Try Again</a>
        </div>
      </div>
    </div>
  </body>
</html>
