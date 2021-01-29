<?php

namespace Intervolga\Task2;

/**
 * Масшатбирует изображение с заданным качеством и возвращает <image> с base64 закодированным изображением.
 *
 * @param string $path
 * @param int $sX
 * @param int $sY
 * @param int $quality
 * @return string
 */
function resizeImage(string $path, int $sX, int $sY, int $quality)
{
    $imageType = getimagesize($path)['mime'];
    switch ($imageType) {
        case 'image/jpeg':
            $from = imagecreatefromjpeg('image.jpg');
            break;
        case 'image/png':
            $from = imagecreatefrompng('image.jpg');
            break;
        case 'image/bmp':
            $from = imagecreatefrombmp('image.jpg');
            break;
        default:
            throw new \Exception('Unsupported image format');
    }
    $to = imagecreatetruecolor($sX, $sY);
    imagecopyresampled($to, $from, 0, 0, 0, 0, $sX, $sY, imagesx($from), imagesy($from));
    ob_start();
    imagejpeg($to, null, $quality);
    imagedestroy($to);
    $im = ob_get_clean();
    return "<img src='data:$imageType;base64," . base64_encode($im) . "'>";
}
