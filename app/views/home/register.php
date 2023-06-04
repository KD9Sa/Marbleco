<!DOCTYPE html>
<html lang="en">
  <!-- Home Head -->
  <?php
    include('../../templates/home-head.php');
    $password_error = "";
    $email_error = "";
    
    if (isset($_POST["register_submit"])) {
        // Validate the password is 8 characters or more
        if (strlen($_POST["password"]) < 8) {
          $password_error = "Passwords must be at least 8 characters";
        }

        // Validate the email does not already exist
        elseif (count(getUserByEmail($_POST["email"])) > 0) {
          $email_error = "Email already exists. You can sign in instead.";
        }

        // Create a user
        else {
          createUser($_POST["full_name"], $_POST["email"], $_POST["password"]);
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

        <!-- Register Form -->
        <div class="col-sm-4 px-5 py-5">
          <form action="" method="POST">
            <span class="font-roboto" style="color: red;"><?php echo $email_error ?></span>
            <h1 class="h3 mb-3 fw-normal">Register</h1>
            <div class="form-floating">
              <input
                type="text"
                class="form-control"
                id="floatingInput"
                name="full_name"
                placeholder="John Smith"
                required
              />
              <label for="floatingInput">Full Name</label>
            </div>
            <div class="form-floating">
              <input
                type="email"
                class="form-control"
                id="floatingInput"
                name="email"
                placeholder="name@example.com"
                required
              />
              <label for="floatingInput">Email address</label>
              <span class="font-roboto" style="color: red;"><?php echo $password_error ?></span>
            </div>
            <div class="form-floating">
              <input
                type="password"
                class="form-control"
                id="floatingPassword"
                name="password"
                placeholder="Password"
                required
              />
              <label for="floatingPassword">Password</label>
            </div>
            <button
              class="w-100 btn btn-lg btn-outline-primary mt-3"
              type="submit"
              name="register_submit"
            >
              Register
            </button>
            <div class="d-flex justify-content-end">
              <p>Already have an account? <a href="index.php">Sign in.</a></p>
            </div>
          </form>
        </div>
        <!-- Register Form -->
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
