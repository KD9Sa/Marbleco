<!DOCTYPE html>
<html lang="en">
  <!-- Home Head -->
  <?php
  include('../../templates/home-head.php');
  $role_error = "";
  $credentials_error="";
  $result="";
  $row=array();

  if (isset($_POST["login_submit"])) {
    $result = authenticateUser($_POST["email"], $_POST["password"]);
    foreach ($result as $res) {
      $row = $res;
    }

    if (count($row) === 0) {
      $credentials_error = "The email or password is incorrect.";
    }
    elseif ($row['role'] === "DF") {
      $role_error = "You have not been provided a role yet.";
    }
  }
  ?>
  <!-- !Home Head -->
  <body>
    <header id="header">
      <!-- Home Navigation Bar-->
      <?php
        include('../../templates/home-nav.php');
      ?>
      <!-- !Home Navigation Bar-->
    </header>

    <main id="main">
      <div class="row align-items-center">
        <!-- Home Carousel -->
        <?php
          include('../../templates/home-carousel.php');
        ?>
        <!-- !Home Carousel -->

        <!-- Login Form -->
        <div class="col-sm-4 px-5 py-5">
          <form action="" method="POST">
            <span class="font-roboto" style="color: red;"><?php echo $credentials_error ?></span>
            <span class="font-roboto" style="color: red;"><?php echo $role_error ?></span>
            <h1 class="h3 mb-3 fw-normal">Sign in</h1>

            <div class="form-floating">
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="name@example.com"
                required
              />
              <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                placeholder="Password"
                required
              />
              <label for="floatingPassword">Password</label>
            </div>
            <button
              class="w-100 btn btn-lg btn-outline-primary mt-3"
              id="submit"
              type="submit"
              name="login_submit"
            >
              Sign in
            </button>
            <div class="d-flex justify-content-end">
              <a href="forgot-password.php">Forgot Password?</a>
            </div>
          </form>
          <form action="register.php">
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">
                Register
            </button>
          </form>
        </div>
        <!-- !Login Form -->
      </div>
    </main>

    <!-- Home Footer -->
    <?php
        include('../../templates/home-footer.php');
    ?>
    <!-- !Home Footer -->

    <!-- Home Scripts -->
    <?php
        include('../../templates/home-scripts.php');
    ?>
    <!-- !Home Scripts -->
  </body>
</html>
