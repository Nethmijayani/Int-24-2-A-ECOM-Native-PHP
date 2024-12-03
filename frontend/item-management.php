<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required Meta Tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- Add Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!--J Query-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />

    <title>YumZy - Food & Beverages</title>
    <link rel="icon" type="image/png" href="./assets/images/yumzy-icon.png" />

    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      crossorigin="anonymous"
    ></script>

    <!-- Bootstrap JS Bundle -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    <link rel="stylesheet" href="./assets/css/item-management.css" />
    <link rel="stylesheet" href="./assets/js/side-bar/sidebar.css" />
  </head>
  <body
    style="
      font-family: 'Lato', sans-serif;
      background-color: #6c6a6a;
      height: 100%;
    "
  >
    <!-- <common-sidebar></common-sidebar> -->
    <?php include './assets/js/side-bar/sidebar.php';?>

    <section class="p-3">
      <div class="row">
        <div class="col-12">
          <h6 class="mb-4">Add Item</h6>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="table-container">
            <table
              class="table table-striped table-hover text-center table-bordered"
            >
              <thead class="table-dark">
                <tr>
                  <th>Item Name</th>
                  <th>Item Description</th>
                  <th>Price (Rs)</th>
                  <th>Category</th>
                  <th>Item Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="data">
                <!-- Dynamic Content -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <button
        class="add-item-btn"
        data-bs-toggle="modal"
        data-bs-target="#userForm"
      >
        Add Items <i class="bi bi-plus-circle"></i>
      </button>
    </section>

    <!-- Modal Form for Add/Edit Items -->
    <div
      class="modal fade"
      id="userForm"
      tabindex="-1"
      aria-labelledby="userFormLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="userFormLabel">Item Information</h4>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>

          <div class="modal-body">
            <form id="myForm">
              <div class="card image-holder mb-3">
                <label for="imgInput" class="upload">
                  <i class="bi bi-plus-circle-dotted fs-1"></i>
                  <input
                    type="file"
                    name="item_image"
                    id="imgInput"
                    accept="image/*"
                    style="display: none"
                  />
                </label>
                <img
                  id="imgPreview"
                  src=" "
                  alt=" "
                  width="200px"
                  height="200px"
                  class="img d-block mx-auto"
                />
              </div>

              <div class="inputField">
                <div class="mb-3 flex-column">
                  <label for="name" class="form-label">Item Name</label>
                  <input type="text" id="name" class="form-control" required />
                </div>

                <div class="mb-3 flex-column">
                  <label for="description" class="form-label"
                    >Item Description</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="description"
                    required
                  />
                </div>

                <div class="mb-3 flex-column">
                  <label for="price" class="form-label">Price (Rs)</label>
                  <input
                    type="number"
                    class="form-control"
                    id="price"
                    required
                  />
                </div>

                <div class="mb-3 flex-column">
                  <label for="category" class="form-label">Category</label>
                  <select id="category" class="form-select" required>
                    <option value="">Select Category</option>
                    <option value="pizza">Pizza</option>
                    <option value="cake">Cake</option>
                    <option value="beverage">Beverage</option>
                  </select>
                </div>
              </div>
            </form>
          </div>

          <div class="modal-footer">
            <button type="submit" form="myForm" class="btn btn-primary">
              Submit
            </button>
            <button type="reset" form="myForm" class="btn btn-secondary">
              Cancel
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- View Data Modal -->
    <div
      class="modal fade"
      id="readData"
      tabindex="-1"
      aria-labelledby="readDataLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="readDataLabel">View Item</h4>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>

          <div class="modal-body">
            <div class="card image-holder mb-3">
              <img
                id="viewImg"
                alt="Item Image"
                width="200"
                height="200"
                class="img d-block mx-auto"
              />
            </div>

            <div class="inputField">
              <div class="mb-3">
                <label for="viewName" class="form-label">Item Name</label>
                <input
                  type="text"
                  id="viewName"
                  class="form-control"
                  disabled
                />
              </div>
              <div class="mb-3">
                <label for="viewDescription" class="form-label"
                  >Item Description</label
                >
                <input
                  type="text"
                  id="viewDescription"
                  class="form-control"
                  disabled
                />
              </div>
              <div class="mb-3">
                <label for="viewPrice" class="form-label">Price (Rs)</label>
                <input
                  type="number"
                  id="viewPrice"
                  class="form-control"
                  disabled
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="./assets/js/item-management.js"></script>
  </body>
</html>
