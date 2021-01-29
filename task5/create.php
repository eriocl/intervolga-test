<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Intervolga\Task5\DbConnection;
use Intervolga\Task5\Country;

session_start();
if (isset($_POST['addCountry'])) {
    $pdo = DbConnection::make();
    $country = new Country($pdo);
    $newCountry = $_POST['country'];
    $errors = $country->validate($newCountry);
    if (empty($errors)) {
        $country->addCountry($newCountry);
        $_SESSION['flash'] = 'Country added';
        header('Location: index.php');
    } else {
        $_SESSION['errors'] = $errors;
        $_SESSION['newCountry'] = $newCountry;
        header('Location: create.php');
    }
} else {
    $errors = $_SESSION['errors'] ?? '';
    $newCountry = $_SESSION['newCountry'] ?? '';
    $_SESSION = [];
}
include __DIR__ . "/templates/header.php";
include __DIR__ . "/templates/create-main.php";
include __DIR__ . "/templates/footer.php";
