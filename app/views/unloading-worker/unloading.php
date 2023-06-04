<!DOCTYPE html>
<html lang="en">
  <!-- Workers Head -->
  <?php
    include('../../templates/workers-head.php');
    session_start();


    if (isset($_POST['unload'])) {
      createBlock($_POST['color'], $_POST['date_unloaded'], $_SESSION['id']);
    }
  ?>
  <!-- !Workers Head -->
  <body>
    <header id="header"></header>

    <main id="main" class="d-flex flex-nowrap">
      <!-- Unloading Worker Sidebar -->
      <div
        class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary"
        style="width: 280px"
      >
        <a
          href="#"
          class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none"
        >
          <img src="../../../public/img/logo-blue.png" alt="" width="128rem" />
        </a>
        <hr />
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a
              href="unloading.php"
              class="nav-link active"
              aria-current="page"
            >
              <span class="bi pe-none me-2" width="16" height="16">
                <i class="fa-solid fa-boxes-packing"></i>
              </span>

              Unloading Form
            </a>
          </li>
          <li>
            <a href="history.php" class="nav-link link-body-emphasis">
              <span class="bi pe-none me-2" width="16" height="16">
                <i class="fa-solid fa-clock-rotate-left"></i>
              </span>
              History
            </a>
          </li>
        </ul>
        <div class="mt-auto">
          <hr />
          <div class="dropdown">
            <a
              href="#"
              class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <img
                src="../../../public/img/profile.png"
                alt=""
                width="32"
                height="32"
                class="rounded-circle me-2"
              />
              <strong><?php echo $_SESSION['full_name']; ?></strong>
            </a>
            <ul class="dropdown-menu text-small shadow">
              <li><a class="dropdown-item" href="profile.php">Profile</a></li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="../home/sign_out.php">Sign out</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- !Unloading Worker Sidebar -->

      <!-- Unloading Form -->
      <div class="w-50 d-flex flex-column overflow-auto">
          <div class="w-100 p-3">
              <h4 class="font-roboto">Unloading Form</h4>
              <form action="" method="POST">
              <div class="card mb-4">
                  <div class="card-body">
                  <div class="row">
                      <div class="col-sm-3">
                      <p class="mb-0">Color</p>
                      </div>
                      <div class="col-sm-9">
                        <select name='color'>
                          <option value='Blue' selected>Blue</option>
                          <option value='White'>White</option>
                          <option value='Grey'>Grey</option>
                          <option value='Black'>Black</option>
                        </select>
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-sm-3">
                      <p class="mb-0">Date Unloaded</p>
                      </div>
                      <div class="col-sm-9">
                        <input type='date' class="mb-0" name='date_unloaded'>
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-sm-3">
                      </div>
                      <div class="col-sm-9">
                      <button type="submit" class="btn btn-primary" name="unload">Unload</button>
                      </div>
                  </div>
                  </div>
              </div>
              </form>
          </div>
      </div>
      <!-- !Unloading Form -->
    </main>

    <!-- Home Scripts -->
    <?php
        include('../../templates/workers-scripts.php');
    ?>
    <!-- !Home Scripts -->
  </body>
</html>
