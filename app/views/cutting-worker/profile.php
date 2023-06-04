<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
  <!-- Workers Head -->
  <?php
    include('../../templates/workers-head.php');
    session_start();

    if (isset($_POST['profile_update'])) {
      $full_name = $_POST['full_name'];
      $email = $_POST['email'];
      if ($_POST['password'] === '') {
        $password = $_SESSION['password'];
      }
      else {
        $password = $_POST['password'];
      }
      updateUserProfile($_SESSION['id'], $full_name, $email, $password);

      $_SESSION['full_name'] = $full_name;
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $password;
    }
  ?>
  <!-- !Workers Head -->
  <body>
    <header id="header"></header>

    <main id="main" class="d-flex flex-row">
      <!-- Cutting Worker Sidebar -->
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
            <a href="machines.php" class="nav-link link-body-emphasis" aria-current="page">
              <span class="bi pe-none me-2" width="16" height="16">
                <i class="fa-regular fa-hard-drive"></i>
              </span>

              Machines
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
      <!-- !Cutting Worker Sidebar -->

      <!-- Profile -->
      <?php
        include('../../templates/workers-profile.php');
      ?>
      <!-- !Profile -->
    </main>

    <!-- Home Scripts -->
    <?php
        include('../../templates/workers-scripts.php');
    ?>
    <!-- !Home Scripts -->
  </body>
</html>
