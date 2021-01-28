<?php

namespace Intervolga\Task1;

function truncate(string $text, string $link): string
{
    if (empty($text)) {
        return '';
    }
    if (mb_strlen($text) > 180) {
            $spacePos = mb_strpos($text, ' ', 180);
            $cuttedText = $spacePos ? mb_substr($text, 0, $spacePos) : $text;
    } else {
        $cuttedText = trim($text);
    }
    $words = explode(' ', $cuttedText);
    if (count($words) < 3) {
        return "<a href=\"https://www.google.ru/\">$cuttedText...</a>";
    }
    $lastTwoWords = array_slice($words, count($words) - 2);
    $restWords = array_slice($words, 0, count($words) - 2);
    $text = implode(' ', $restWords);
    $ref = implode(' ', $lastTwoWords);
    return $text . ' ' . "<a href=\"$link\">$ref...</a>";
}
