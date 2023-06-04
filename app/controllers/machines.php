<?php
require('../../models/Machine.php');

function getAllMachines() {
    $db = new DBController();
    $machineStore = new Machine($db);
    $machinesList = $machineStore->index();
    return $machinesList;
}

function getMachineById($id) {
    $db = new DBController();
    $machineStore = new Machine($db);
    $machine = $machineStore->show($id);
    return $machine;
}

function updateMachineToBusy($id) {
    $db = new DBController();
    $machineStore = new Machine($db);
    $machine = $machineStore->updateToBusy($id);
    return $machine;
}

function updateMachineToAvailable($id) {
    $db = new DBController();
    $machineStore = new Machine($db);
    $machine = $machineStore->updateToAvailable($id);
    return $machine;
}

