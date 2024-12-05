$(function () {
  //Pizza limit
  let allPizzaData = [];
  let pizzaLimit = 3;

  axios
    .get("https://ecom-back-t1.netfy.app/api/items/category/pizza")
    .then((response) => {
      allPizzaData = response.data;
      displayPizzaItems(allPizzaData.slice(0, pizzaLimit));
    })
    .catch((error) => console.error("Error loading menu data:", error));

  // Display cake items on the page
  function displayPizzaItems(items) {
    const $menu = $("#pizzaMenu");
    items.forEach((item) => {
      const menuItem = $(`
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card-container">
              <div class="food-card">
                <div class="image-container">
                  <img src="https://ecom-back-t1.netfy.app${item.item_image}" alt="${
        item.item_name
      }">
                  <div class="overlay"><p>${item.item_description}</p></div>
                </div>
                <div class="item-name"><h5>${item.item_name}</h5></div>
                <div class="item-price"><h6>Rs: ${item.item_price}</h6></div>
                <button class="order-btn" data-item='${JSON.stringify(
                  item
                )}'>Order Now</button>
              </div>
            </div>
          </div>
        `);
      $menu.append(menuItem);
    });

    $(".order-btn").on("click", handleAddToCart);
  }

  // Load more items
  $("#viewMoreBtn").on("click", function () {
    const additionalItems = allPizzaData.slice(pizzaLimit, pizzaLimit + 6);
    displayPizzaItems(additionalItems);
    pizzaLimit += 6;
    if (pizzaLimit >= allPizzaData.length) {
      $("#viewMoreBtn").hide();
    }
  });

  // Handle "Order Now" button
  function handleAddToCart(event) {
    const item = JSON.parse($(event.target).attr("data-item"));
    const token = sessionStorage.getItem("authToken");

    if (!token) {
      localStorage.setItem("redirectAfterLogin", "index.php#menu");
      window.location.href = "user-reg.php";
      return;
    }

    addToCart(item);
  }

  // Add item to cart
  function addToCart(item) {
    const token = sessionStorage.getItem("authToken");
    console.log("Adding item to cart:", item);
    console.log("Using token:", token);

    axios
      .post(
        "https://ecom-back-t1.netfy.app/api/cart/add",
        { item_id: item.item_id },

        {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        }
      )
      .then((response) => {
        console.log("Response Data:", response);
        alert(`${item.item_name} has been added to your cart.`);
        window.location.href = 'cart.php';
      })
      .catch((error) => {
        console.error(
          "There was an error adding the item to your cart:",
          error
        );
        const errorMessage = error.responseJSON?.message || "Unknown error";
        alert(`Error adding item to cart: ${errorMessage}`);
      });
  }
});
