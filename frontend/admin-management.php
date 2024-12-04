<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Management</title>
    <link rel="icon" type="image/png" href="./assets/images/yumzy-icon.png" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="./assets/css/admin-management.css" />
    <link rel="stylesheet" href="./assets/js/side-bar/sidebar.css" />

    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      crossorigin="anonymous"
    ></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="./assets/widgets/sidebar.php"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="./assets/js/admin-management.js"></script>
  </head>
  <body>
    <!-- <common-sidebar></common-sidebar> -->
    <?php include './assets/js/side-bar/sidebar.php';?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-10 admin-list">
          <h3>Admin List</h3>

          <div id="adminListContainer" class="d-flex flex-wrap gap-3">
            <!--Admin list will dispaly here-->
          </div>

          <button id="addAdminButton" class="btn custom-btn mt-5">
            Add a new admin
          </button>
        </div>
      </div>
    </div>

    <!--Add admin model-->
    <div
      class="modal fade"
      id="adminModal"
      tabindex="-1"
      aria-labelledby="adminModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-custom">
        <div class="modal-content modal-content-custom">
          <div class="pt-3 px-3">
            <h5 class="modal-title custom-title" id="adminModalLabel">
              Admin Profile
            </h5>
          </div>

          <div class="modal-body">
            <form
              method="POST"
              id="addAdminForm"
              class="needs-validation"
              novalidate
              enctype="multipart/form-data"
            >
              <div class="row">
                <div class="col-7">
                  <div class="mb-3 row">
                    <label for="firstName" class="col-sm-3 col-form-label"
                      >First Name</label
                    >
                    <div class="col-sm-9">
                      <input
                        type="text"
                        class="form-control"
                        id="firstName"
                        required
                      />
                      <div class="invalid-feedback">Please fill the field!</div>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="lastName" class="col-sm-3 col-form-label"
                      >Last Name</label
                    >
                    <div class="col-sm-9">
                      <input
                        type="text"
                        class="form-control"
                        id="lastName"
                        required
                      />
                      <div class="invalid-feedback">Please fill the field!</div>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="userName" class="col-sm-3 col-form-label"
                      >User Name</label
                    >
                    <div class="col-sm-9">
                      <input
                        type="text"
                        class="form-control"
                        id="userName"
                        required
                      />
                      <div class="invalid-feedback">Please fill the field!</div>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="role" class="col-sm-3 col-form-label"
                      >Role</label
                    >
                    <div class="col-sm-9">
                      <select class="form-select" id="role" required>
                        <option value="" selected disabled>
                          Select a Role
                        </option>
                        <option value="admin">Admin</option>
                        <option value="super admin">Super Admin</option>
                      </select>
                      <div class="invalid-feedback">Please fill the field!</div>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="email" class="col-sm-3 col-form-label"
                      >Email
                    </label>
                    <div class="col-sm-9">
                      <input
                        type="email"
                        class="form-control"
                        id="email"
                        required
                      />
                      <div class="invalid-feedback">Please fill the field!</div>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="password" class="col-sm-3 col-form-label"
                      >Password
                    </label>
                    <div class="col-sm-9">
                      <input
                        type="password"
                        class="form-control"
                        id="password"
                        required
                      />
                      <div class="invalid-feedback">Please fill the field!</div>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="phoneNumber" class="col-sm-3 col-form-label"
                      >P.No
                    </label>
                    <div class="col-sm-9">
                      <input
                        type="tel"
                        class="form-control"
                        id="phoneNumber"
                        required
                      />
                      <div class="invalid-feedback">Please fill the field!</div>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="address" class="col-sm-3 col-form-label"
                      >Address</label
                    >
                    <div class="col-sm-9">
                      <input
                        type="text"
                        class="form-control"
                        id="address"
                        required
                      />
                      <div class="invalid-feedback">Please fill the field!</div>
                    </div>
                  </div>
                </div>

                <div class="col-5">
                  <label for="adminImage" class="form-label"
                    >Upload Admin Image:</label
                  >
                  <input
                    type="file"
                    class="form-control"
                    id="adminImage"
                    accept="image/*"
                    required
                  />
                  <div class="invalid-feedback">Please fill the field!</div>

                  <img
                    id="adminImagePreview"
                    src="#"
                    alt="Image Preview"
                    class="d-none img-thumbnail mt-3"
                    width="150"
                    height="150"
                  />
                </div>
              </div>

              <div class="d-flex button-section">
                <button
                  type="submit"
                  id="submitAdminButton"
                  class="btn btn-custom"
                >
                  Submit
                </button>
                <button
                  type="button"
                  class="btn btn-custom"
                  data-bs-dismiss="modal"
                >
                  Discard
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
