<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YumZy - Food & Beverages</title>
    <link rel="icon" type="image/png" href="./assets/images/yumzy-icon.png" />
    <!--Bootstrap CSS-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!--Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/order-management.css" />
    <link rel="stylesheet" href="./assets/widgets/sidebar.css" />
    <!--Bootstrap JS,  jQuery and Axios -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  </head>
  <body>
    <common-sidebar></common-sidebar>

    <div class="content">
      <div class="container mt-5">
        <h2 class="order-title">Order List</h2>
        <table class="table table-dark table-hover">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Item Name</th>
              <th>Price</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="order-list"></tbody>
        </table>
      </div>

      <div
        class="modal fade"
        id="orderDetailsModal"
        tabindex="-1"
        aria-labelledby="orderDetailsModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <!-- Modal Header -->
            <div
              class="modal-header d-flex justify-content-between align-items-center"
            >
              <h3 class="modal-title" id="orderDetailsModalLabel">
                Order Details
              </h3>
              <span id="orderId" class="order-id mx-auto">Order ID: 12345</span>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
              <p id="customer-id">Customer ID:</p>
              <p id="customer-name">Item Name:</p>
              <p id="customer-phone">Phone:</p>
              <p id="customer-address">Address:</p>
              <!-- Order Items Table -->
              <div class="table-responsive">
                <table class="table table-dark table-striped">
                  <thead>
                    <tr>
                      <th>Item</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody id="order-items"></tbody>
                </table>
              </div>
              <!-- Subtotal, Delivery Fee, Discount, and Total -->
              <p id="subtotal">Subtotal:</p>
              <p id="discount">Discount:</p>
              <label for="totalPrice">Total:</label>
              <input
                type="text"
                id="totalPrice"
                class="form-control"
                readonly
              />
              <!-- Order Status Dropdown -->
              <label for="orderStatus">Order Status:</label>
              <select id="orderStatus" class="form-control">
                <option>Pending</option>
                <option>Successful</option>
                <option>Failed</option>
              </select>
              <!-- Update Status Button -->
              <button
                type="button"
                id="updateStatusBtn"
                class="btn btn-primary mt-3"
              >
                Update Status
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="./assets/widgets/sidebar.php"></script>
    <script>
      async function fetchOrdersFromBackend() {
        try {
          const response = await axios.get(
            "https://ecom-back-t1.netfy.app/api/orders/admin/orders",
            {
              headers: {
                Authorization: `Bearer ${localStorage.getItem("authToken")}`,
              },
            }
          );
          return response.data;
        } catch (error) {
          console.error("Failed to fetch orders:", error);
          return [];
        }
      }

      let currentOrderId = null;

      function renderOrderList(orders) {
        const orderList = $("#order-list");
        orderList.empty();
        orders.forEach((order) => {
          const row = `
      <tr data-order-id="${order.order_id}">
        <td>${order.order_id}</td>
        <td>${order.item_names}</td>
        <td>Rs. ${order.total_final_price}</td>
        <td class="order-status">${order.order_status}</td>
        <td>
          <div class="icon-container d-flex flex-wrap justify-content-center align-items-center">
          <button class="btn btn-warning btn-sm view-btn" data-order-id="${order.order_id}" title="View">
            <i class="fa fa-eye"></i>
          </button>
          <button class="btn btn-danger btn-sm delete-btn" data-order-id="${order.order_id}" title="Delete">
           <i class="fa fa-trash" aria-hidden="true"></i>
          </button>
          </div>
        </td>
      </tr>`;
          orderList.append(row);
        });
      }

      async function fetchOrderDetails(orderId) {
        try {
          const response = await axios.get(
            `https://ecom-back-t1.netfy.app/api/orders/order-details/${orderId}`,
            {
              headers: {
                Authorization: `Bearer ${localStorage.getItem("authToken")}`,
              },
            }
          );
          return response.data;
        } catch (error) {
          console.error("Error fetching order details:", error);
          alert(
            `An error occurred while fetching order details for Order ID ${orderId}.`
          );
          return null;
        }
      }

      async function populateModal(orderId) {
        try {
          const order = await fetchOrderDetails(orderId);
          currentOrderId = orderId;

          if (!order || !order.orderDetails || !order.orderItems) {
            alert("Order details not available.");
            return;
          }

          $("#orderId").text(`Order ID: ${order.orderDetails.order_id}`);
          $("#customer-id").text(
            `Customer ID: ${order.orderDetails.user_id || "N/A"}`
          );
          $("#customer-name").text(
            `Customer Name: ${order.orderDetails.first_name || "N/A"} ${
              order.orderDetails.last_name || "N/A"
            }`
          );
          $("#customer-phone").text(
            `Phone: ${order.orderDetails.phone_number || "N/A"}`
          );
          $("#customer-address").text(
            `Address: ${order.orderDetails.address || "N/A"}, ${
              order.orderDetails.city || "N/A"
            }, ${order.orderDetails.postal_code || "N/A"}`
          );

          const itemsHtml = order.orderItems
            .map(
              (item) => `
      <tr>
          <td>${item.item_name || "Unknown Item"}</td>
          <td>${item.quantity || "0"}</td>
          <td>Rs. ${parseFloat(item.item_price).toFixed(2) || "0.00"}</td>
          <td>Rs. ${
            (item.quantity * parseFloat(item.item_price)).toFixed(2) || "0.00"
          }</td>
      </tr>`
            )
            .join("");
          $("#order-items").html(itemsHtml);

          $("#subtotal").text(
            `Subtotal: Rs. ${
              parseFloat(order.orderDetails.total_price).toFixed(2) || "0.00"
            }`
          );
          $("#discount").text(
            `Discount: Rs. ${
              parseFloat(order.orderDetails.discount).toFixed(2) || "0.00"
            }`
          );
          $("#totalPrice").val(
            `Rs. ${
              parseFloat(order.orderDetails.final_total_price).toFixed(2) ||
              "0.00"
            }`
          );
          $("#orderStatus").val(order.orderDetails.order_status || "Pending");
        } catch (error) {
          console.error("Error in populateModal:", error);
          alert("An error occurred while populating order details.");
        }
      }

      async function updateOrderStatus(orderId, newStatus) {
        try {
          const response = await axios.put(
            `https://ecom-back-t1.netfy.app/api/orders/admin/order-status/${orderId}`,
            { newStatus },
            {
              headers: {
                Authorization: `Bearer ${localStorage.getItem("authToken")}`,
                "Content-Type": "application/json",
              },
            }
          );

          $(`tr[data-order-id="${orderId}"] .order-status`).text(
            response.data.order_status
          );
        } catch (error) {
          console.error("Error updating order status:", error);
          alert("Failed to update order status.");
        }
      }

      $(async function () {
        try {
          const orders = await fetchOrdersFromBackend();
          renderOrderList(orders);
        } catch (error) {
          console.error("Error fetching orders:", error);
          alert("Failed to fetch orders. Please try again later.");
        }

        $(document).on("click", ".view-btn", async function () {
          try {
            const orderId = $(this).data("order-id");
            await populateModal(orderId);
            $("#orderDetailsModal").modal("show");
          } catch (error) {
            console.error("Error loading order details:", error);
            alert("Failed to load order details.");
          }
        });

        $(document).on("click", ".delete-btn", async function () {
          const orderId = $(this).data("order-id");
          const confirmation = confirm(
            "Are you sure you want to delete this order?"
          );

          if (confirmation) {
            try {
              const authToken = localStorage.getItem("authToken");
              if (!authToken) {
                alert("Authorization token is missing. Please log in again.");
                return;
              }

              const response = await axios.delete(
                `https://ecom-back-t1.netfy.app/api/orders/admin/delete/${orderId}`,
                {
                  headers: {
                    Authorization: `Bearer ${authToken}`,
                  },
                }
              );

              if (response.data) {
                alert("Order deleted successfully!");
                $(this).closest("tr").remove();
              } else {
                alert("Failed to delete order.");
              }
            } catch (error) {
              console.error("Error deleting order:", error);
              alert("An error occurred while deleting the order.");
            }
          }
        });

        $("#updateStatusBtn")
          .off("click")
          .on("click", async function () {
            try {
              const newStatus = $("#orderStatus").val();
              if (!currentOrderId) {
                alert("No order selected for update.");
                return;
              }
              await updateOrderStatus(currentOrderId, newStatus);
              alert("Order status updated successfully!");
              location.reload();
            } catch (error) {
              console.error("Error updating order status:", error);
              alert("Failed to update order status.");
            }
          });
      })();
    </script>
  </body>
</html>
