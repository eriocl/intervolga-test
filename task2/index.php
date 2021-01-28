<?php

require_once __DIR__ . "/../vendor/autoload.php";

use function Intervolga\Task2\resizeImage;

$image = resizeImage('image.jpg', 200, 100, 45);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Intervolga task2</title>
</head>
<body>
<a href="https://www.google.ru/"> <?= $image ?></a>
</body>
</html>



