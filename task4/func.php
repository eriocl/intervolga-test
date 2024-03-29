<?php

namespace Intervolga\Task4;

/**
 * Считает количество пар последовательных элементов.
 *
 * @param array $arr
 * @return int
 */
function getPair(array $arr): int
{
    if (empty($arr)) {
        return 0;
    }
    $count = 0;
    for ($i = 0; $i < count($arr) - 2; $i++) {
        if ($arr[$i] === $arr[$i + 1]) {
            $count++;
        }
    }
    return $count;
}
