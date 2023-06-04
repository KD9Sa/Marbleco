<!DOCTYPE html>
<html lang="en">
  <!-- Workers Head -->
  <?php
    include('../../templates/workers-head.php');
    date_default_timezone_set("Asia/Riyadh");
    session_start();

    $machines = getAllMachines();
    $blocks = getUncuttedBlocks();

    if (isset($_POST['cut'])) {
      header("Refresh:0");
      createNewActivity($_POST['block_id'], $_POST['machine_id'], date("M j, Y H:i:s"));
      updateMachineToBusy($_POST['machine_id']);
    }

    if (isset($_POST['block_id_date'])) {
      header("Refresh:0");
      deleteAnActivity($_POST['cutting_machine_date']);
      updateMachineToAvailable($_POST['cutting_machine_date']);
      updateCutting($_POST['block_id_date'], $_POST['sliced_into_date'], $_SESSION['id'], $_POST['cutting_machine_date']);
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
            <a href="machines.php" class="nav-link active" aria-current="page">
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

      <!-- Machines -->
      <div class="d-flex flex-column overflow-auto">
        <!-- Available Machines -->
        <div class="w-100 p-3">
          <h4 class="font-roboto">Available Machines</h4>
          <div class="row mb-2">
            <?php 
              foreach ($machines as $machine) {
                if ($machine['status'] === 'Available') {
                  echo "<div class='col-sm-6'>";
                  echo "<div class='row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative'>";
                  echo "<div class='col p-4 d-flex flex-column position-static'>";
                  echo "<strong class='d-inline-block mb-2 text-success'>{$machine['status']}</strong>";
                  echo "<h3 class='mb-0'>{$machine['brand']}</h3>";
                  echo "<div class='mb-1 text-body-secondary'>{$machine['model']}</div>";
                  echo "<p class='card-text mb-auto'>
                          Slice Into: {$machine['slice_into']} Slices
                          <br/>
                          Slicing Time: {$machine['slicing_time']} Minutes
                        </p>";
                  echo "<form method='POST' action=''>";
                  echo "<div class='accordion' id='accordionPanelsStayOpenExample'>";
                  echo "<div class='accordion-item'>";
                  echo "<h2 class='accordion-header'>";
                  echo "<button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#accordion{$machine['id']}' aria-expanded='false' aria-controls='accordion{$machine['id']}'>Available Blocks</button>";
                  echo "</h2>";
                  echo "<div id='accordion{$machine['id']}' class='accordion-collapse collapse'>";
                  echo "<div class='accordion-body'>";
                  echo "<table class='table table-striped table-sm'>";
                  echo "<thead>";
                  echo "<tr>";
                  echo "<th scope='col'>   </th>";
                  echo "<th scope='col'>Id</th>";
                  echo "<th scope='col'>Color</th>";
                  echo "<th scope='col'>Date Unloaded</th>";
                  echo "</tr>";
                  echo "</thead>";
                  echo "<tbody>";
                  foreach ($blocks as $block) {
                    echo "<tr>";
                    echo "<input type='hidden' name='machine_id' value='{$machine['id']}'>";
                    echo "<input type='hidden' name='sliced_into' value='{$machine['slice_into']}'>";
                    echo "<td><input type='radio' name='block_id' value='{$block['id']}'></td>";
                    echo "<td>{$block['id']}</td>";
                    echo "<td>{$block['color']}</td>";
                    echo "<td>{$block['date_unloaded']}</td>";
                    echo "</tr>";
                  }
                  echo "</tbody>";
                  echo "</table>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "<button type='submit' class='btn btn-primary' name='cut'>Begin Cutting</button>";
                  echo "</form>";
                  echo "</div>";
                  echo "</div>";
                }
              }
            ?>
          </div>
        </div>
        <!-- !Available Machines -->
        <hr />
        <!-- Busy Machines -->
        <div class="w-100 p-3">
          <h4 class="font-roboto">Busy Machines</h4>
          <div class="row mb-2">
            <?php 
              foreach ($machines as $machine) {
                if ($machine['status'] === 'Busy') {
                  echo "<div class='col-sm-6'>";
                  echo "<div class='row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative'>";
                  echo "<div class='col p-4 d-flex flex-column position-static'>";
                  echo "<strong class='d-inline-block mb-2 text-danger'>{$machine['status']}</strong>";
                  echo "<h3 class='mb-0'>{$machine['brand']}</h3>";
                  echo "<div class='mb-1 text-body-secondary'>{$machine['model']}</div>";
                  echo "<p class='card-text mb-auto'>
                          Slice Into: {$machine['slice_into']} Slices
                          <br/>
                          Slicing Time: {$machine['slicing_time']} Minutes
                        </p>";
                  echo "<table class='table table-striped table-sm'>";
                  echo "<thead>";
                  echo "<tr>";
                  echo "<th scope='col'> </th>";
                  echo "<th scope='col'>Id</th>";
                  echo "<th scope='col'>Color</th>";
                  echo "<th scope='col'>Date Unloaded</th>";
                  echo "<th scope='col'>Remaining Time</th>";
                  echo "</tr>";
                  echo "</thead>";
                  echo "<tbody>";
                  $activity = getActivityByMachine($machine['id']);
                  $block = getBlockById($activity['block_id']);
                  echo "<tr>";
                  echo "<td> </td>";
                  echo "<td>{$block['id']}</td>";
                  echo "<td>{$block['color']}</td>";
                  echo "<td>{$block['date_unloaded']}</td>";
                  echo "<td><p id=\"{$machine['id']}\"></p></td>";
                  echo "</tr>";

                  echo "</tbody>";
                  echo "</table>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                }
              }
            ?>
          </div>
        </div>
        <!-- !Busy Machines -->

        <!-- Hidden Form -->
          <form method="POST" action="" id="update_busy" name="update_busy">
            <input type="hidden" id="block_id_date" name="block_id_date" value="">
            <input type="hidden" id="sliced_into_date" name="sliced_into_date" value="">
            <input type="hidden" id="cutting_machine_date" name="cutting_machine_date" value="">
          </form>
        <!-- !Hidden Form -->

      </div>
      <!-- !Machines -->
    </main>

    <!-- Home Scripts -->
    <?php
        include('../../templates/workers-scripts.php');
    ?>
    <!-- !Home Scripts -->
    <script>
      <?php $activities = getAllActivities(); ?>
      setInterval(function() {
        distance = 100;
        <?php
          foreach ($activities as $activity) {
            $minutes_to_add = getMachineById($activity['machine_id'])['slicing_time'];
            $time = $activity['time'];
        ?>
            var startTime = new Date("<?php echo $time; ?>");
            var endTime = new Date(startTime.getTime() + <?php echo $minutes_to_add; ?>*60000);

            var now = new Date().getTime();
            var distance =  endTime - now;
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById("<?php echo $activity['machine_id'] ?>").innerHTML = minutes + 'm ' + seconds + 's';

            if (distance < 0) {
              document.getElementById("block_id_date").value = <?php echo $activity['block_id']; ?>;
              document.getElementById("sliced_into_date").value = <?php echo getMachineById($activity['machine_id'])['slice_into']; ?>;
              document.getElementById("cutting_machine_date").value = <?php echo $activity['machine_id']; ?>;
              document.getElementById("update_busy").submit();
            }
        <?php } ?>
      }, 1000);
    </script>
  </body>
</html>
