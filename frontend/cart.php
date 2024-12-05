<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YumZy - Food & Beverages</title>
    <link rel="icon" type="image/png" href="./assets/images/yumzy-icon.png" />
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/cart.css" />
    <!-- Add Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!--J Query-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Google font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap"
      rel="stylesheet"
    />
    <!-- Font-Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body
    style="
      font-family: 'Lato', sans-serif;
      background-image: none;
      height: 100%;
    "
  >
    <!-- Navbar -->
    <?php include 'header.php'; ?>

    <div class="container">
      <div class="row">
        <!-- Cart table -->
        <div class="col-lg-8">
          <table id="cart-table" class="table table-striped">
            <thead>
              <tr>
                <th></th>
                <th></th>
                <th>Item</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Remove</th>
              </tr>
            </thead>
            <tbody id="cart-items"></tbody>
          </table>
          <button
            class="btn-add"
            onclick="window.location.href='index.php#menu'"
          >
            Add item
          </button>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
          <div class="order-summary">
            <h4>Order Summary</h4>
            <table>
              <tr>
                <td>No. of Items</td>
                <td>:</td>
                <td><span id="item-count">0</span></td>
              </tr>
              <tr>
                <td>Sub Total</td>
                <td>:</td>
                <td>Rs.<span id="sub-total">0.00</span></td>
              </tr>
              <tr>
                <td>Discount</td>
                <td>:</td>
                <td>Rs.<span id="discount">0.00</span></td>
              </tr>
              <tr>
                <td colspan="3"><hr class="full-width-line" /></td>
              </tr>
              <tr>
                <td><strong>Total </strong></td>
                <td>:</td>
                <td>
                  <strong>Rs. <span id="total">0.00</span></strong>
                </td>
              </tr>
            </table>
            <button class="btn-checkout" onclick="passItemsToCheckout()">
              Proceed to Checkout
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Section -->
    <?php include 'footer.php'; ?>

    <!-- External JavaScript Files -->
    <script src="./assets/js/cart.js"></script>
    <script src="./assets/widgets/contact.js"></script>
  </body>
</html>
