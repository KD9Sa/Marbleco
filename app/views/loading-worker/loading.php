<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
  <!-- Workers Head -->
  <?php
    include('../../templates/workers-head.php');
    session_start();
    $blocks = getCuttedBlocks();

    if (isset($_POST['load'])) {
      header("Refresh:0");
      updateLoading($_POST['block_id'], date("Y-m-d"), $_SESSION['id']);
    }
  ?>
  <!-- !Workers Head -->
  <body>
    <header id="header"></header>

    <main id="main" class="d-flex flex-nowrap">
      <!-- Loading Worker Sidebar -->
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
            <a href="loading.php" class="nav-link active" aria-current="page">
              <span class="bi pe-none me-2" width="16" height="16">
                <i class="fa-solid fa-truck-ramp-box"></i>
              </span>

              Loading Form
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
      <!-- !Loading Worker Sidebar -->

      <!-- Available Machines -->
      <div class="w-100 p-3">
        <h4 class="font-roboto">Available Blocks</h4>
        <div class="row mb-2">
          <?php 
            foreach ($blocks as $block) {
              echo "<div class='col-sm-6'>";
              echo "<div class='row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative'>";
              echo "<div class='col p-4 d-flex flex-column position-static'>";
              echo "<h3 class='mb-0'>ID: {$block['id']}</h3>";
              echo "<div class='mb-1 text-body-secondary'>Color: {$block['color']}</div>";
              echo "<p class='card-text mb-auto'>
                      Sliced Into: {$block['sliced_into']} Slices
                      <br/>
                      Cutting Machine ID: {$block['cutting_machine']}
                    </p>";
              echo "</div>";
              echo "<form method='POST' action=''>";
              echo "<input type='hidden' name='block_id' value='{$block['id']}'>";
              echo "<button type='submit' class='w-100 btn btn-primary' name='load'>Load Block</button>";
              echo "</form>";
              echo "</div>";
              echo "</div>";
            }
          ?>
        </div>
      </div>
      <!-- !Available Machines -->
    </main>

    <!-- Home Scripts -->
    <?php
        include('../../templates/workers-scripts.php');
    ?>
    <!-- !Home Scripts -->
  </body>
</html>
