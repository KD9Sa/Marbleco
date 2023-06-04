<?php
require('../../database/db-controller.php');
require('../../models/User.php');

function getAllUsers() {
    $db = new DBController();
    $userStore = new User($db);
    $usersList = $userStore->index();
    return $usersList;
}

function getUserByEmail($email) {
    $db = new DBController();
    $userStore = new User($db);
    $user = $userStore->show($email);
    return $user;
}

function createUser($full_name, $email, $password) {
    $db = new DBController();
    $userStore = new User($db);

    $duplicate = getUserByEmail($email);
    if (count($duplicate) > 0) {
        $message = "Email Exists";
        return $message;
    }

    $newUser = $userStore->create($full_name, $email, $password);
    return $newUser;
}

function updateUser($id, $role) {
    $db = new DBController();
    $userStore = new User($db);
    $updatedUser = $userStore->update($id, $role);
    return $updatedUser;
}

function updateUserProfile($id, $full_name, $email, $password) {
    $db = new DBController();
    $userStore = new User($db);
    $updatedUser = $userStore->updateProfile($id, $full_name, $email, $password);
    return $updatedUser;
}

function deleteUser($id) {
    $db = new DBController();
    $userStore = new User($db);
    $deletedUser = $userStore->delete($id);
    return $deletedUser;
}

function authenticateUser($email, $password) {
    $db = new DBController();
    $userStore = new User($db);
    $authenticatedUser = $userStore->authenticate($email, $password);
    return $authenticatedUser;
}