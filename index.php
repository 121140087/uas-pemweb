<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="index.css" />
    <title>Toko Ikan - Login</title>
  </head>
  <body>
    <?php if (isset($_SESSION['error'])) { ?>
    <p class="error">
      <?php echo $_SESSION['error']; ?>
    </p>
    <?php unset($_SESSION['error']); ?>
    <?php } ?>

    <div class="container">
      <img src="logo.png" class="image" alt="logo" />

      <form action="login.php" method="post">
        <div class="form-group">
          <label class="label" for="username">Username:</label>
          <input
            placeholder="umy_afifah"
            type="text"
            id="user"
            name="user"
          />
        </div>
        <div class="form-group">
          <label class="label" for="password">Password:</label>
          <input
            placeholder="123"
            type="password"
            id="sandi"
            name="sandi"
          />
        </div>
        <button type="submit" class="login-button">Submit</button>
      </form>

      <script>
        function CekCookie() {
          var userIdCookie = AmbilCookie("user_id");
          if (userIdCookie) {
            window.location.href = "home.php";
          }
        }

        function AmbilCookie(name) {
          var match = document.cookie.match(
            new RegExp("(^| )" + name + "=([^;]+)")
          );
          return match ? match[2] : null;
        }

        CekCookie();
        document.addEventListener("DOMContentLoaded", function () {
          const loginForm = document.querySelector("form");

          loginForm.addEventListener("submit", function (event) {
            event.preventDefault();

            const username = document.getElementsByName("user")[0].value;
            const password = document.getElementsByName("sandi")[0].value;

            fetch("login.php", {
              method: "POST",
              headers: {
                "Content-Type": "application/x-www-form-urlencoded",
              },
              body: new URLSearchParams({
                user: username,
                sandi: password,
              }),
            })
              .then((response) => response.json())
              .then((data) => {
                if (data.success) {
                  // Jika Cookie Ada
                  document.cookie =
                    "user_id=" +
                    encodeURIComponent(data.user_id) +
                    "; expires=" +
                    new Date(
                      new Date().getTime() + 30 * 24 * 60 * 60 * 1000
                    ).toUTCString() +
                    "; path=/";
                  window.location.href = "home.php";
                } else {
                  // Jika Tidak Ada Cookie
                  window.location.href = "index.php";
                }
              });
          });
        });
      </script>
    </div>
  </body>
</html>
