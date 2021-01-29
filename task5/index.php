<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Intervolga\Task5\DbConnection;
use Intervolga\Task5\Country;

session_start();
$pdo = DbConnection::make();
$country = new Country($pdo);
$countries = $country->getAllCountries();
$flash = $_SESSION['flash'] ?? '';
$_SESSION = [];
include __DIR__ . "/templates/header.php";
include __DIR__ . "/templates/index-main.php";
include __DIR__ . "/templates/footer.php";
