$(function () {
  $("#icon-click").on("click", function () {
    $("#icon").toggleClass("fa-eye");

    const input = $("#password");
    input.attr("type", input.attr("type") === "password" ? "text" : "password");
  });

  $("#loginForm").on("submit", function (e) {
    e.preventDefault();
    const form = $(this);

    if (form[0].checkValidity()) {
      form.addClass("was-validated");
      submitLoginForm();
    } else {
      form.addClass("was-validated");
    }
  });

  function submitLoginForm() {
    const username = $("#userName").val();
    const password = $("#password").val();

    axios
      .post("http://localhost:5010/api/auth/login", {
        username,
        password,
      })
      .then(function (response) {
        sessionStorage.setItem("authToken", response.data.token);
        sessionStorage.setItem("role", response.data.role);

        // Send token and role to PHP for server-side session storage
        $.post("store-sessions.php", {
          authToken: response.data.token,
          role: response.data.role,
          username: response.data.username,
        }).done(function (data) {
          console.log("Response from server:", data);
          if (data.success) {
            alert("Login Successfully!");
            console.log("Login session stored successfully.");
            // Redirect based on role
            if (
              response.data.role === "admin" ||
              response.data.role === "super admin"
            ) {
              window.location.href = "./dashboard.php";
            } else {
              window.location.href = "./#menu";
            }
          } else {
            alert("Failed to set login session.");
          }
        });
      })
      .catch(function (error) {
        console.error("Error:", error);
        $("#failed-modal-container").load("./log-fail.php", function () {
          $("#failModal").modal("show");
        });
      });
  }
});
