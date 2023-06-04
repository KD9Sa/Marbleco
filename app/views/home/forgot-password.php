<!DOCTYPE html>
<html lang="en">
  <!-- Home Head -->
  <?php
    include('../../templates/home-head.php');
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
      <!-- Forgot Password Form -->
      <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center min-vh-100">
          <div class="col-12 col-md-8 col-lg-4">
            <div class="card shadow-sm">
              <div class="card-body">
                <div class="mb-4">
                  <h5>Forgot Password?</h5>
                </div>
                <form>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group mb-3">
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Enter Email"
                      />
                      <div class="input-group-prepend">
                        <button
                          class="btn btn-outline-primary"
                          id="send-btn"
                          type="button"
                        >
                          Send Code
                        </button>
                      </div>
                    </div>
                    <label for="code" class="form-label">Code</label>
                    <input
                      type="text"
                      id="code"
                      class="form-control"
                      name="code"
                      placeholder="Enter Code"
                      required=""
                    />
                    <label for="code" class="form-label">New Password</label>
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="Enter New Password"
                      required=""
                    />
                    <label for="code" class="form-label"
                      >Re-enter New Password</label
                    >
                    <input
                      type="password"
                      id="repassword"
                      class="form-control"
                      name="repassword"
                      placeholder="Re-enter New Password"
                      required=""
                    />
                  </div>
                  <div class="mb-3 d-grid">
                    <button type="submit" class="btn btn-primary">
                      Reset Password
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- !Forgot Password Form -->
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
