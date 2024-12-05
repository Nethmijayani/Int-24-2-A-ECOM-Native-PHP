<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YumZy - Food & Beverages</title>
    <link rel="icon" href="./assets/images/yumzy-icon.png" type="image/png" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css"
    />

    <link rel="stylesheet" href="./assets/css/dashboard.css" />
    <link rel="stylesheet" href="./assets/js/side-bar/sidebar.css" />

    <link
      href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap"
      rel="stylesheet"
    />

    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>

    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="./assets/js/side-bar/sidebar.js"></script>

    <script src="./assets/js/dashboard.js"></script>
  </head>
  <body
    style="
      font-family: 'Lato', sans-serif;
      height: 100vh;
      background-color: #1e1e1e !important;
    "
  >
    <!-- <common-sidebar></common-sidebar> -->
     <?php include './assets/js/side-bar/sidebar.php';?>

    <div class="content">
      <!-- Order Summary Section -->
      <div class="container my-1">
        <h2 class="order-title">Order Summary</h2>

        <div class="row text-center mb-4">
          <!-- Total Orders -->
          <div class="col-lg-3 col-md-6 col-6 mb-3">
            <div class="order-summary-box">
              <p>Total Orders:</p>
              <h4 id="total-orders">0</h4>
            </div>
          </div>

          <!-- Pending Orders -->
          <div class="col-lg-3 col-md-6 col-6 mb-3">
            <div class="order-summary-box">
              <p>Pending Orders:</p>
              <h4 id="pending-orders">0</h4>
            </div>
          </div>

          <!-- Successful Orders -->
          <div class="col-lg-3 col-md-6 col-6 mb-3">
            <div class="order-summary-box">
              <p>Successful Orders:</p>
              <h4 id="successful-orders">0</h4>
            </div>
          </div>

          <!-- Failed Orders -->
          <div class="col-lg-3 col-md-6 col-6 mb-3">
            <div class="order-summary-box">
              <p>Failed Orders:</p>
              <h4 id="failed-orders">0</h4>
            </div>
          </div>
        </div>

        <!-- Chart Section -->
        <div class="row">
          <!-- Pie Chart-->
          <div class="col-lg-4 col-md-6 mb-4 text-center">
            <div class="chart-box">
              <h4 class="pb-1 pt-1">Order Status Distribution</h4>
              <canvas id="pieChart" class="pt-2"></canvas>
            </div>
          </div>

          <!-- Bar Chart-->
          <div class="col-lg-8 col-md-6 mb-3 text-center">
            <div class="chart-box">
              <h4>Order Summary Chart</h4>
              <canvas id="barChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Special Offers Section -->
      <div class="container my-4">
        <h2>Special Offers</h2>
        <div
          id="offerList"
          class="text-center mt-5 d-flex flex-wrap gap-3 justify-content-center"
        >
          <!-- Offer images will be dynamically loaded here -->
        </div>
        <div class="text-center my-2 mt-3">
          <button id="addOfferButton" class="btn custom-yellow ml-2">
            Add New
          </button>
        </div>
      </div>

      <!-- Popup Modal for Adding New Offer -->
      <div
        class="modal fade"
        id="addOfferModal"
        tabindex="-1"
        aria-labelledby="addOfferModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addOfferModalLabel">Add New Offer</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                id="closeModal"
              ></button>
            </div>
            <div class="modal-body">
              <form
                id="offerForm"
                method="POST"
                class="needs-validation"
                novalidate
                enctype="multipart/form-data"
              >
                <div class="form-group">
                  <label for="offerTitle">Title</label>
                  <input
                    type="text"
                    class="form-control"
                    id="offerTitle"
                    placeholder="Enter offer details"
                    required
                  />
                  <div class="invalid-feedback">Please fill the field!</div>
                </div>

                <div class="form-group">
                  <label for="offerDetail">Description</label>
                  <input
                    type="text"
                    class="form-control"
                    id="offerDetail"
                    placeholder="Enter offer details"
                    required
                  />
                  <div class="invalid-feedback">Please fill the field!</div>
                </div>

                <div class="form-group">
                  <label for="category" class="form-label">Category</label>
                  <select class="form-select" id="category" required>
                    <option value="" selected disabled>
                      Select a category
                    </option>
                    <option value="cake">Cake</option>
                    <option value="pizza">Pizza</option>
                    <option value="beverage">Beverage</option>
                  </select>
                  <div class="invalid-feedback">Please fill the field!</div>
                </div>

                <div class="form-group">
                  <label for="offerImage">Upload Image</label><br />
                  <input
                    type="file"
                    class="form-control"
                    id="offerImage"
                    accept="image/*"
                    required
                  />
                  <div class="invalid-feedback">Please fill the field!</div>
                </div>

                <div class="form-group">
                  <label for="startDate">Start Date</label>
                  <input
                    type="date"
                    class="form-control"
                    id="startDate"
                    placeholder="Enter offer details"
                    required
                  />
                  <div class="invalid-feedback">Please fill the field!</div>
                </div>

                <div class="form-group">
                  <label for="endDate">End Date</label>
                  <input
                    type="date"
                    class="form-control"
                    id="endDate"
                    placeholder="Enter offer details"
                    required
                  />
                  <div class="invalid-feedback">Please fill the field!</div>
                </div>

                <div class="mt-2">
                  <h6>Promotion Rules</h6>
                  <div id="rulesContainer">
                    <!-- Rules will be dynamically added here -->
                  </div>
                  <button
                    type="button"
                    class="btn btn-sm btn mt-2 mb-3"
                    id="addRuleBtn"
                    style="
                      border: solid #c59d5f;
                      font-weight: 500;
                      color: white;
                    "
                  >
                    Add Rule
                  </button>
                </div>

                <div class="modal-footer pt-2">
                  <button type="submit" class="btn" id="submitOfferBtn">
                    Submit
                  </button>
                  <button type="button" class="btn" data-bs-dismiss="modal">
                    Cancel
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--customers-->
    <div class="container-lg" style="color: beige">
      <h2>Customer details</h2>
      <table id="example" class="display" style="width: 100%">
        <thead>
          <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>Email Address</th>
          </tr>
        </thead>
        <tbody id="customer-list"></tbody>
      </table>
    </div>
    <div style="height: 20px"></div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </body>
</html>
