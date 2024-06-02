<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Pharmacy Management - Login</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
  <div class="container">
    <div class="card m-auto p-2">
      <div class="card-body">
        <form name="login-form" class="login-form" action="home.php" method="post">
          <div class="logo">
            <img src="images/prof.jpg" class="profile" />
            <h1 class="logo-caption"><span class="tweak">L</span>ogin</h1>
          </div>
          <!-- logo class -->
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user text-white"></i></span>
            </div>
            <input name="username" id="username" type="text" class="form-control" placeholder="username" required>
          </div>
          <!-- input-group class -->
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
            </div>
            <input name="password" id="password" type="password" class="form-control" placeholder="password" required>
          </div>
          <!-- input-group class -->
          <div class="form-group">
            <button id="loginButton" class="btn btn-default btn-block btn-custom">Login</button>
          </div>
        </form>
        <!-- form close -->
      </div>
      <!-- card-body class -->
      <!-- <div class="card-footer">
        <div class="text-center">
          <a class="text-light" href="#">Forgot password?</a>
        </div> -->
      </div>
      <!-- cord-footer class -->
    </div>
    <!-- card class -->
  </div>
  <!-- container class -->

  <script>
    var isAdmin = "false";

    function validate() {
      var uname = document.getElementById("username").value;
      var pswd = document.getElementById("password").value;
      var xhttp = new XMLHttpRequest();

      xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
          isAdmin = xhttp.responseText;
          if (isAdmin === "true") {
            // Credentials are valid, allow form submission
            document.forms["login-form"].submit();
          } else {
            // Credentials are invalid, prevent form submission
            alert("Username or password invalid!");
          }
        }
      };

      xhttp.open("GET", "php/validateCredentials.php?action=is_admin&uname=" + uname + "&pswd=" + pswd, true);
      xhttp.send();
    }

    document.addEventListener("DOMContentLoaded", function() {
      var loginForm = document.querySelector('.login-form');

      loginForm.addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission
        validate(); // Perform validation
      });
    });
  </script>
</body>

</html>
