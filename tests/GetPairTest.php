<?php

namespace Intervolga\Task4\tests;

use PHPUnit\Framework\TestCase;

use function Intervolga\Task4\getPair;

class GetPairTest extends TestCase
{
    public function testTruncate(): void
    {
        $arr = [];
        $expected2 = 0;
        $actual2 = getPair($arr);
        $this->assertEquals($expected2, $actual2);

        $arr = [1, 1, 2, 3, 4 - 51, 12, 12, 12, -51];
        $expected2 = 3;
        $actual2 = getPair($arr);
        $this->assertEquals($expected2, $actual2);
    }
}
