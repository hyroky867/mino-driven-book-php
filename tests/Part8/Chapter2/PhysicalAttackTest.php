<?php

declare(strict_types=1);

namespace Test\Part8\Chapter2;

use App\Part8\Chapter2\PhysicalAttack;
use PHPUnit\Framework\TestCase;

class PhysicalAttackTest extends TestCase
{
    private PhysicalAttack $attack;

    protected function setUp(): void
    {
        parent::setUp();
        $this->attack = new PhysicalAttack();
    }

    /** @test */
    public function singleAttackDamage(): void
    {
        $actual = $this->attack->singleAttackDamage();
        $this->assertSame(
            expected: 100,
            actual: $actual,
        );
    }

    /** @test */
    public function doubleAttackDamage(): void
    {
        $actual = $this->attack->doubleAttackDamage();
        $this->assertSame(
            expected: 200,
            actual: $actual,
        );
    }
}
