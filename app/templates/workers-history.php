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