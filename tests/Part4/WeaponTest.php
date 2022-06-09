<?php

declare(strict_types=1);

namespace Test\Part4;

use App\Part4\AttackPower;
use App\Part4\Weapon;
use PHPUnit\Framework\TestCase;

class WeaponTest extends TestCase
{
    /** @test */
    public function reinForce_強化されるべき(): void
    {
        $first_value = 5;
        $first_weapon = new Weapon(
            attack_power: new AttackPower(value: $first_value),
        );

        $increment = 10;
        $actual = $first_weapon->reinForce(
            increment: new AttackPower(value: $increment),
        );

        $expected = $first_value + $increment;
        $this->assertSame(
            expected: $expected,
            actual: $actual->attack_power->value,
        );
    }
}
