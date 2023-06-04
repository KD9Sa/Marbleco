<!DOCTYPE html>
<html lang="en">
  <!-- Workers Head -->
  <?php
    include('../../templates/workers-head.php');
    session_start();

    $result = getAllUsers();

    if (isset($_POST['save_submit'])) {
      echo "<meta http-equiv='refresh' content='0'>";
      if (isset($_POST['delete'])) {
        deleteUser($_POST['id']);
      }
      updateUser($_POST['id'], $_POST['role']);
    }
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
            <a href="blocks.php" class="nav-link link-body-emphasis">
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
            <a href="users.php" class="nav-link active" aria-current="page">
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

      <!-- Users Table -->
      <div class="w-100 d-flex flex-column p-4">
        <!-- Newly Registered -->
        <h4 class="font-roboto pt-2">Newly Registered</h4>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Role</th>
                <th scope="col">Delete</th>
                <th scope="col">Save</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              foreach ($result as $row) {
                if ($row['role'] == 'DF') {
                  echo "<form action='users.php' method='POST'>";
                  echo "<tr>";
                  echo "<input name='id' type='hidden' value='{$row['id']} hidden'>";
                  echo "<td>{$row['id']}</td>";
                  echo "<td>{$row['full_name']}</td>";
                  echo "<td>{$row['email']}</td>";
                  echo "<td>{$row['password']}</td>";
                  echo "<td><select name='role'>
                              <option value='DF' selected>DF</option>
                              <option value='UW'>UW</option>
                              <option value='CW'>CW</option>
                              <option value='LW'>LW</option>
                            </select></td>";
                  echo "<td><input type='checkbox' id='DEL{$row['id']}' name='delete'>";
                  echo "<td><button class='btn btn-light' type='submit' name='save_submit'>✔</button>";
                  echo "</tr>";
                  echo "</form>";
                }
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- !Newly Registered -->

        <hr />

        <!-- Unloading Workers -->
        <h4 class="font-roboto pt-2">Unloading Workers</h4>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Role</th>
                <th scope="col">Delete</th>
                <th scope="col">Save</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              foreach ($result as $row) {
                if ($row['role'] == 'UW') {
                  echo "<form action='users.php' method='POST'>";
                  echo "<tr>";
                  echo "<input name='id' type='hidden' value='{$row['id']} hidden'>";
                  echo "<td>{$row['id']}</td>";
                  echo "<td>{$row['full_name']}</td>";
                  echo "<td>{$row['email']}</td>";
                  echo "<td>{$row['password']}</td>";
                  echo "<td><select name='role'>
                              <option value='DF'>DF</option>
                              <option value='UW' selected>UW</option>
                              <option value='CW'>CW</option>
                              <option value='LW'>LW</option>
                            </select></td>";
                  echo "<td><input type='checkbox' id='DEL{$row['id']}' name='delete'>";
                  echo "<td><button class='btn btn-light' type='submit' name='save_submit'>✔</button>";
                  echo "</tr>";
                  echo "</form>";
                }
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- !Unloading Workers -->

        <hr />

        <!-- Cutting Workers -->
        <h4 class="font-roboto pt-2">Cutting Workers</h4>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Role</th>
                <th scope="col">Delete</th>
                <th scope="col">Save</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              foreach ($result as $row) {
                if ($row['role'] == 'CW') {
                  echo "<form action='users.php' method='POST'>";
                  echo "<tr>";
                  echo "<input name='id' type='hidden' value='{$row['id']} hidden'>";
                  echo "<td>{$row['id']}</td>";
                  echo "<td>{$row['full_name']}</td>";
                  echo "<td>{$row['email']}</td>";
                  echo "<td>{$row['password']}</td>";
                  echo "<td><select name='role'>
                              <option value='DF'>DF</option>
                              <option value='UW'>UW</option>
                              <option value='CW' selected>CW</option>
                              <option value='LW'>LW</option>
                            </select></td>";
                  echo "<td><input type='checkbox' id='DEL{$row['id']}' name='delete'>";
                  echo "<td><button class='btn btn-light' type='submit' name='save_submit'>✔</button>";
                  echo "</tr>";
                  echo "</form>";
                }
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- Cutting Workers -->

        <hr />

        <!-- Loading Workers -->
        <h4 class="font-roboto pt-2">Loading Workers</h4>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Role</th>
                <th scope="col">Delete</th>
                <th scope="col">Save</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              foreach ($result as $row) {
                if ($row['role'] == 'LW') {
                  echo "<form action='users.php' method='POST'>";
                  echo "<tr>";
                  echo "<input name='id' type='hidden' value='{$row['id']} hidden'>";
                  echo "<td>{$row['id']}</td>";
                  echo "<td>{$row['full_name']}</td>";
                  echo "<td>{$row['email']}</td>";
                  echo "<td>{$row['password']}</td>";
                  echo "<td><select name='role'>
                              <option value='DF'>DF</option>
                              <option value='UW'>UW</option>
                              <option value='CW'>CW</option>
                              <option value='LW' selected>LW</option>
                            </select></td>";
                  echo "<td><input type='checkbox' id='DEL{$row['id']}' name='delete'>";
                  echo "<td><button class='btn btn-light' type='submit' name='save_submit'>✔</button>";
                  echo "</tr>";
                  echo "</form>";
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- !Loading Workers -->
      <!-- !Users Table -->
    </main>

    <!-- Home Scripts -->
    <?php
        include('../../templates/workers-scripts.php');
    ?>
    <!-- !Home Scripts -->
  </body>
</html>
