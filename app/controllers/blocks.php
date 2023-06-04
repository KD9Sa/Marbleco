<?php
require('../../models/Block.php');

function getAllBlocks() {
    $db = new DBController();
    $blockStore = new Block($db);
    $blocksList = $blockStore->index();
    return $blocksList;
}

function getAllActivities() {
    $db = new DBController();
    $blockStore = new Block($db);
    $blocksList = $blockStore->indexActivity();
    return $blocksList;
}

function getUncuttedBlocks() {
    $db = new DBController();
    $blockStore = new Block($db);
    $blocksList = $blockStore->indexUncutted();
    return $blocksList;
}

function getCuttedBlocks() {
    $db = new DBController();
    $blockStore = new Block($db);
    $blocksList = $blockStore->indexcutted();
    return $blocksList;
}

function getAllBlocksByUser($user_id, $user_role) {
    $db = new DBController();
    $blockStore = new Block($db);
    $blocksList = $blockStore->indexByUserId($user_id, $user_role);
    return $blocksList;
}

function getActivityByMachine($machine_id) {
    $db = new DBController();
    $blockStore = new Block($db);
    $blocksList = $blockStore->showActivity($machine_id);
    return $blocksList;
}

function getBlockById($id) {
    $db = new DBController();
    $blockStore = new Block($db);
    $block = $blockStore->show($id);
    return $block;
}

function createBlock($color, $date_unloaded, $unloaded_by) {
    $db = new DBController();
    $blockStore = new Block($db);
    $newBlock = $blockStore->create($color, $date_unloaded, $unloaded_by);
    return $newBlock;
}

function createNewActivity($block_id, $machine_id, $time) {
    $db = new DBController();
    $blockStore = new Block($db);
    $newBlock = $blockStore->createActivity($block_id, $machine_id, $time);
    return $newBlock;
}

function updateCutting($id, $sliced_into, $cutted_by, $cutting_machine) {
    $db = new DBController();
    $blockStore = new Block($db);
    $newBlock = $blockStore->updateCut($id, $sliced_into, $cutted_by, $cutting_machine);
    return $newBlock;
}

function updateLoading($id, $date_loaded, $loaded_by) {
    $db = new DBController();
    $blockStore = new Block($db);
    $newBlock = $blockStore->updateLoad($id, $date_loaded, $loaded_by);
    return $newBlock;
}

function deleteAnActivity($machine_id) {
    $db = new DBController();
    $blockStore = new Block($db);
    $newBlock = $blockStore->deleteActivity($machine_id);
    return $newBlock;
}
