<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>YumZy - Food & Beverages</title>
    <link rel="icon" type="image/png" href="./assets/images/yumzy-icon.png" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/checkout.css" />
    <link rel="stylesheet" href="./assets/styles/delivery.css" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap"
      rel="stylesheet"
    />

    <!-- Font-Awesome CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!-- Add Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!--J Query-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>
  <body
    style="
      font-family: 'Lato', sans-serif;
      background-image: none;
      height: 100vh;
    "
  >
    <!-- Header -->
    <?php include 'header.php'; ?>
    

    <div class="container my-5">
      <div class="row">
        <div class="col-lg-8">
          <div id="checkout-error" class="text-danger mb-3"></div>

          <!-- Table for order items -->
          <table id="checkout-table" class="table table-striped text-white">
            <thead>
              <tr>
                <th></th>
                <th>Item</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Remove</th>
              </tr>
            </thead>
            <tbody id="order-items">
              <!-- Items will be loaded here dynamically -->
            </tbody>
          </table>
          <button class="btn-add" onclick="window.location.href='cart.php'">
            Back
          </button>
        </div>

        <!-- Order summary -->
        <div class="col-lg-4">
          <div class="order-summary">
            <h4>Order Summary</h4>
            <table id="order-summary-table">
              <!-- Dynamic summary content will be inserted here -->
            </table>
            <button
              type="button"
              class="btn btn-success mt-3"
              data-bs-toggle="modal"
              data-bs-target="#orderFormModal"
            >
              Open Order Form
            </button>

            <!-- Order Form Modal -->
            <div
              class="modal fade"
              id="orderFormModal"
              tabindex="-1"
              aria-labelledby="orderFormModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="orderFormModalLabel">
                      Billing Address
                    </h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                    <div class="container">
                      <div class="col">
                        <div class="row">
                          <div class="col mb-4">
                            <label for="firstName">First Name</label>
                            <input
                              type="text"
                              id="firstName"
                              class="form-control"
                              placeholder="First name"
                              aria-label="First name"
                              required
                            />
                          </div>
                          <div class="col mb-4">
                            <label for="lastName">Last Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="lastName"
                              placeholder="Last name"
                              aria-label="Last name"
                              required
                            />
                          </div>
                        </div>

                        <div class="mb-4">
                          <label for="useremail">Email</label>
                          <input
                            type="email"
                            id="useremail"
                            class="form-control"
                            placeholder="you@example.com"
                            aria-label="email"
                            required
                          />
                        </div>

                        <div class="mb-4">
                          <label for="address">Address</label>
                          <input
                            type="text"
                            class="form-control"
                            id="address"
                            placeholder="1234 Main St"
                            aria-label="Address"
                            required
                          />
                        </div>

                        <div class="row">
                          <div class="col mb-4">
                            <label for="phone_number">Mobile Number</label>
                            <div class="input-group">
                              <span class="input-group-text">+94</span>
                              <input
                                type="tel"
                                id="phone_number"
                                class="form-control"
                                placeholder="712345678"
                                pattern="[0-9]{9}"
                                required
                                aria-label="Mobile number"
                              />
                            </div>
                          </div>
                          <div class="col mb-4">
                            <label for="postalCode">Postal Code</label>
                            <input
                              type="text"
                              id="postalCode"
                              class="form-control"
                              placeholder="Postal code"
                              aria-label="Postal code"
                              required
                            />
                          </div>
                        </div>

                        <hr class="mb-4" />

                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="paymentMethod"
                            id="creditCard"
                            checked
                            required
                          />
                          <label class="form-check-label" for="creditCard">
                            Credit card (Default)
                          </label>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="paymentMethod"
                            id="debitCard"
                            required
                          />
                          <label class="form-check-label" for="debitCard">
                            Debit card
                          </label>
                        </div>

                        <div class="row">
                          <div class="col mb-4">
                            <label for="cardName">Name on card</label>
                            <input
                              type="text"
                              id="cardName"
                              class="form-control"
                              aria-label="card1"
                              required
                            />
                            <small class="text-muted">
                              Full name, as displayed on the card</small
                            >
                          </div>

                          <div class="col mb-4">
                            <label for="cardNumber">Card Number</label>
                            <input
                              type="text"
                              id="cardNumber"
                              class="form-control"
                              placeholder="1234-5678-9012"
                              aria-label="Card2"
                              required
                            />
                          </div>
                        </div>

                        <div class="row">
                          <div class="col mb-3">
                            <label for="cardExpiry">Expiry Date</label>
                            <input
                              type="text"
                              id="cardExpiry"
                              class="form-control"
                              aria-label="card3"
                              required
                            />
                          </div>

                          <div class="col mb-3">
                            <label for="cardCVV">CVV</label>
                            <input
                              type="text"
                              id="cardCVV"
                              class="form-control"
                              aria-label="Card4"
                              required
                            />
                          </div>
                        </div>

                        <hr class="mb-4" />

                        <div class="d-grid gap-2">
                          <!-- Button for Continue to Checkout -->
                          <button
                            class="btn btn-primary"
                            type="button"
                            id="checkoutButton"
                          >
                            Continue to Checkout
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
   

    <!-- External JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./assets/widgets/contact.js"></script>
    <script src="./assets/js/checkout.js"></script>
  </body>
</html>
