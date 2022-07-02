<?php

declare(strict_types=1);

namespace Test\Part8\Chapter2;

use App\Part8\Chapter2\FighterPhysicalAttack;
use App\Part8\Chapter2\PhysicalAttack;
use PHPUnit\Framework\TestCase;

class FighterPhysicalAttackTest extends TestCase
{
    private FighterPhysicalAttack $attack;

    protected function setUp(): void
    {
        parent::setUp();
        $this->attack = new FighterPhysicalAttack(
            physicalAttack: new PhysicalAttack(),
        );
    }

    /** @test */
    public function singleAttackDamage(): void
    {
        $actual = $this->attack->singleAttackDamage();
        $this->assertSame(
            expected: 120,
            actual: $actual,
        );
    }

    /** @test */
    public function doubleAttackDamage(): void
    {
        $actual = $this->attack->doubleAttackDamage();
        $this->assertSame(
            expected: 210,
            actual: $actual,
        );
    }
}
