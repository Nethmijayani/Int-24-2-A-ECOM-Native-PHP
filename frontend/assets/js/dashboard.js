$(function () {
  fetchOrderSummary();

  const authToken = sessionStorage.getItem("authToken");

  axios
    .get(
      "http://localhost:5010/api/orders/admin/order-status-percentages",
      {
        headers: {
          Authorization: `Bearer ${authToken}`,
        },
      }
    )
    .then((response) => {
      createPieChart(response.data);
    })
    .catch((error) => {
      console.error("Error fetching pie chart data:", error);
    });

  axios
    .get("http://localhost:5010/api/orders/weekly-order-summary", {
      headers: {
        Authorization: `Bearer ${authToken}`,
      },
    })
    .then((response) => {
      console.log("Data fetched for chart:", response.data);
      createBarChart(response.data);
    })
    .catch((error) => {
      console.error("Error fetching bar chart data:", error);
    });
});

function createPieChart(data) {
  const ctx = $("#pieChart")[0].getContext("2d");

  new Chart(ctx, {
    type: "pie",
    data: {
      labels: ["Pending", "Successful", "Failed"],
      datasets: [
        {
          label: "Order Percentages",
          data: [data.pending, data.successful, data.failed],
          backgroundColor: ["#c59d5f", "#e6b98c", "#8a5a44"],
          borderWidth: 1,
        },
      ],
    },
    options: {
      responsive: true,
      layout: {
        padding: {
          bottom: 50,
          top: 10,
        },
      },
      plugins: {
        legend: {
          labels: {
            color: "white",
          },
          position: "top",
          padding: 0,
        },
      },
    },
  });
}

function createBarChart(data) {
  const ctx = $("#barChart")[0].getContext("2d");
  new Chart(ctx, {
    type: "bar",
    data: {
      labels: Object.keys(data),
      datasets: [
        {
          label: "Pizza Orders",
          data: Object.values(data).map((week) => week.Pizza),
          backgroundColor: "#c59d5f",
          borderWidth: 1,
        },
        {
          label: "Cake Orders",
          data: Object.values(data).map((week) => week.Cake),
          backgroundColor: "#8a5a44",
          borderWidth: 1,
        },
        {
          label: "Beverage Orders",
          data: Object.values(data).map((week) => week.Beverage),
          backgroundColor: "#e6b98c",
          borderWidth: 1,
        },
      ],
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          title: {
            display: true,
            text: "Order Count",
            color: "white",
          },
          ticks: {
            stepSize: 1,
            precision: 0,
            color: "white",
          },
          grid: {
            color: "#ffffff54",
          },
          border: {
            color: "white",
          },
        },
        x: {
          ticks: {
            color: "white",
          },
          grid: {
            color: "#ffffff54",
          },
          border: {
            color: "white",
          },
          title: {
            display: true,
            text: "Weeks",
            color: "white",
          },
        },
      },
      plugins: {
        legend: {
          labels: {
            color: "white",
          },
          position: "top",
        },
        tooltip: {
          bodyColor: "white",
        },
      },
    },
  });
}

function fetchOrderSummary() {

  const authToken = sessionStorage.getItem("authToken");
  axios
    .get("http://localhost:5010/api/orders/admin/statistics", {
      headers: {
        Authorization: `Bearer ${authToken}`,
      },
    })
    .then((response) => {
      const data = response.data;
      $("#total-orders").text(data.totalOrders);
      $("#pending-orders").text(data.pendingOrders);
      $("#successful-orders").text(data.successfulOrders);
      $("#failed-orders").text(data.failedOrders);
    })
    .catch((error) => {
      console.error("Error fetching order data:", error);
    });
}

$(function () {
  const addOfferButton = $("#addOfferButton");
  const submitOfferBtn = $("#submitOfferBtn");
  const offerForm = $("#offerForm");
  const offerList = $("#offerList");
  const rulesContainer = $("#rulesContainer");
  const addRuleButton = $("#addRuleBtn");

  let ruleCount = 0;

  addOfferButton.on("click", function () {
    const addOfferModal = new bootstrap.Modal($("#addOfferModal")[0]);
    addOfferModal.show();
  });

  fetchOffers();

  addRuleButton.on("click", function () {
    addRule();
  });

  rulesContainer.on("click", ".remove-rule-button", function () {
    $(this).closest(".rule-item").remove();
  });

  submitOfferBtn.on("click", async function (e) {
    e.preventDefault();
    if (offerForm[0].checkValidity()) {
      await submitOfferForm();
    } else {
      offerForm.addClass("was-validated");
    }
  });

  function addRule(minPrice = "", discountPercentage = "") {
    ruleCount++;
    const ruleItem = `
      <div class="rule-item border p-2 mb-2">
        <div class="form-group">
          <label for="ruleMinPrice${ruleCount}">Minimum Price</label>
          <input
            type="text"
            class="form-control"
            id="ruleMinPrice${ruleCount}"
            name="ruleMinPrice"
            value="${minPrice}"
            placeholder="Enter minimum price"
            required
          />
        </div>
        <div class="form-group">
          <label for="ruleDiscount${ruleCount}">Discount Percentage</label>
          <input
            type="text"
            class="form-control"
            id="ruleDiscount${ruleCount}"
            name="ruleDiscount"
            value="${discountPercentage}"
            placeholder="Enter discount percentage"
            required
          />
        </div>
        <button type="button" class="btn btn-danger btn-sm remove-rule-button mt-2">
          Remove Rule
        </button>
      </div>`;
    rulesContainer.append(ruleItem);
  }

  async function fetchOffers() {

    const authToken = sessionStorage.getItem("authToken");
    try {
      const response = await axios.get(
        "http://localhost:5010/api/promotion",
        {
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${authToken}`,
          },
        }
      );
      console.log("Fetched Offers:", response.data);

      offerList.empty();
      response.data.forEach((offer) => {
        const imageUrl = offer.promotion_image
          ? `http://localhost:5010${offer.promotion_image}`
          : "";

        const rulesArray = Array.isArray(offer.rules)
          ? offer.rules
          : offer.rules
          ? JSON.parse(offer.rules)
          : [];

        const rulesHtml =
          Array.isArray(offer.rules) && offer.rules.length > 0
            ? offer.rules
                .map(
                  (rule, index) => `
                <li>
                  Rule ${index + 1}: Minimum Price - ${rule.min_price}, 
                  Discount - ${rule.discount_percentage}%
                </li>`
                )
                .join("")
            : "<li>No rules available</li>";

        const offerCard = `
      <div class="card m-2 promotion-card" style="width: 18rem;">
        ${
          offer.promotion_image
            ? `<img src="${imageUrl}" class="card-img-top" >`
            : ""
        }
        <div class="card-body">
          <h5 class="card-title">${offer.title}</h5>
          <h5 class="card-text">${offer.promotion_description}</h5>
          <h6>Start Date: ${new Date(
            offer.start_date
          ).toLocaleDateString()}</h6>
          
          <h6>End Date: ${new Date(offer.end_date).toLocaleDateString()}</h6>
         <h6>Rules:</h6>
            <ul class="rules-list">
              ${rulesHtml}
              </ul> <button class="btn btn-danger remove-offer-button" data-remove-id="${
                offer.promotion_id
              }">Remove offer</button>
        </div>
      </div>
    `;
        offerList.append(offerCard);
      });
    } catch (error) {
      console.error("Error fetching offers:", error);
    }
  }

  async function submitOfferForm() {
  

    const formData = new FormData();
    formData.append("title", $("#offerTitle").val());
    formData.append("promotion_description", $("#offerDetail").val());
    formData.append("categories", $("#category").val());
    formData.append("start_date", $("#startDate").val());
    formData.append("end_date", $("#endDate").val());

    const offerImage = $("#offerImage")[0].files[0];
    formData.append("promotion_image", offerImage);

    const rules = [];
    rulesContainer.find(".rule-item").each(function () {
      const minPrice = $(this).find('input[name="ruleMinPrice"]').val();
      const discountPercentage = $(this)
        .find('input[name="ruleDiscount"]')
        .val();

      if (minPrice && discountPercentage) {
        rules.push({
          min_price: minPrice,
          discount_percentage: discountPercentage,
        });
      }
    });

    console.log("Rules being sent:", rules);

    formData.append("rules", JSON.stringify(rules));

    try {
      const authToken = sessionStorage.getItem("authToken");
      for (let [key, value] of formData.entries()) {
        console.log(`${key}:`, value);
      }

      const response = await axios.post(
        "http://localhost:5010/api/promotion",
        formData,
        {
          headers: {
            "Content-Type": "multipart/form-data",
            Authorization: `Bearer ${authToken}`,
          },
        }
      );

      console.log("Offer added response:", response.data);
      alert("Offer added successfully!");

      offerForm[0].reset();
      offerForm.removeClass("was-validated");

      $("#addOfferModal").modal("hide");

      fetchOffers();
    } catch (error) {
      console.error(
        "Error adding offer:",
        error.response ? error.response.data : error.message
      );
      alert("Failed to add offer.");
    }
  }

  offerList.on("click", ".remove-offer-button", async function () {
    const offerId = $(this).data("remove-id");
    if (confirm("Are you sure you want to remove this offer?")) {
      try {
        const authToken = sessionStorage.getItem("authToken");
        await axios.delete(
          `http://localhost:5010/api/promotion/${offerId}`,
          {
            headers: {
              Authorization: `Bearer ${authToken}`,
            },
          }
        );

        alert("Offer removed successfully!");
        fetchOffers();
      } catch (error) {
        console.error("Error removing offer:", error);
        alert("Failed to remove offer. Please try again.");
      }
    }
  });
});

fetchCustomerData();

function fetchCustomerData() {
  const url = "http://localhost:5010/api/auth/users";
  const authToken = sessionStorage.getItem("authToken");

  axios
    .get(url, {
      headers: {
        Authorization: `Bearer ${authToken}`,
        "Content-Type": "application/json",
      },
    })
    .then((response) => {
      if (
        response.data.status === "success" &&
        Array.isArray(response.data.data)
      ) {
        populateCustomerTable(response.data.data);
      } else {
        console.error("Unexpected data format:", response.data);
      }
    })
    .catch((error) => {
      console.error("Error fetching customer data:", error);
    });
}

function populateCustomerTable(users) {
  const $customerList = $("#customer-list");
  $customerList.empty();

  users.forEach((user) => {
    const $row = $("<tr></tr>");

    $("<td></td>")
      .text(user.user_id || "N/A")
      .appendTo($row);
    $("<td></td>")
      .text(user.username || "N/A")
      .appendTo($row);
    $("<td></td>")
      .text(user.email || "N/A")
      .appendTo($row);

    $customerList.append($row);
  });

  if ($.fn.DataTable.isDataTable("#example")) {
    $("#example").DataTable().clear().destroy();
  }
  $("#example").DataTable({
    pageLength: 5,
    responsive: true,
    autoWidth: false,
    language: {
      emptyTable: "No data available",
      search: "Filter:",
      lengthMenu: "Show _MENU_ entries",
    },
  });
}
