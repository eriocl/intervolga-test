<?php

namespace Intervolga\Task1\tests;

use PHPUnit\Framework\TestCase;

use function Intervolga\Task1\truncate;

class TruncateTest extends TestCase
{
    public function testTruncate(): void
    {
        $link = "https://www.google.ru/";

        $text = '';
        $expected1 = '';
        $actual1 = truncate($text, $link);
        $this->assertEquals($expected1, $actual1);

        $text = "Власти планируют";
        $expected2 = "<a href=\"https://www.google.ru/\">Власти планируют...</a>";
        $actual2 = truncate($text, $link);
        $this->assertEquals($expected2, $actual2);

        $text = file_get_contents(__DIR__ . "/fixtures/textNews");
        $expected3 = file_get_contents(__DIR__ . "/fixtures/cuttedText");
        $actual3 = truncate($text, $link);
        $this->assertEquals($expected3, $actual3);
    }
}
