<!DOCTYPE html>
<html lang="en">
  <!-- Workers Head -->
  <?php
    include('../../templates/workers-head.php');
    session_start();

    $result = getAllBlocks();
  ?>
  <!-- !Workers Head -->
  <body>
    <header id="header"></header>

    <main id="main" class="d-flex flex-nowrap">
      <!-- General Manager Sidebar -->
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
          <li>
            <a href="blocks.php" class="nav-link active">
              <span class="bi pe-none me-2" width="16" height="16">
                <i class="fa-solid fa-cube"></i>
              </span>
              Blocks
            </a>
          </li>
          <li>
            <a href="machines.php" class="nav-link link-body-emphasis">
              <span class="bi pe-none me-2" width="16" height="16">
                <i class="fa-regular fa-hard-drive"></i>
              </span>
              Machines
            </a>
          </li>
          <li class="nav-item">
            <a
              href="users.php"
              class="nav-link link-body-emphasis"
              aria-current="page"
            >
              <span class="bi pe-none me-2" width="16" height="16">
                <i class="fa-regular fa-user"></i>
              </span>

              Users
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
      <!-- !General Manager Sidebar -->

      <!-- Blocks Table -->
      <div class="w-100 d-flex flex-column p-4">
        <h4 class="font-roboto">Blocks</h4>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Color</th>
                <th scope="col">Date Unloaded</th>
                <th scope="col">Sliced Into</th>
                <th scope="col">Date Loaded</th>
                <th scope="col">Unloaded By</th>
                <th scope="col">Cutted By</th>
                <th scope="col">Loaded By</th>
                <th scope="col">Cutting Machine</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              foreach ($result as $row) {
                echo "<form action='users.php' method='POST'>";
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['color']}</td>";
                echo "<td>{$row['date_unloaded']}</td>";
                echo "<td>{$row['sliced_into']}</td>";
                echo "<td>{$row['date_loaded']}</td>";
                echo "<td>{$row['unloaded_by']}</td>";
                echo "<td>{$row['cutted_by']}</td>";
                echo "<td>{$row['loaded_by']}</td>";
                echo "<td>{$row['cutting_machine']}</td>";
                echo "</tr>";
                echo "</form>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- !Blocks Table -->
    </main>

    <!-- Home Scripts -->
    <?php
        include('../../templates/workers-scripts.php');
    ?>
    <!-- !Home Scripts -->
  </body>
</html>
