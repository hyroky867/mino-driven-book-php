<?php

declare(strict_types=1);

namespace Test\Part6;

use App\Part6\HellFire;
use App\Part6\Member;
use PHPUnit\Framework\TestCase;

class HellFireTest extends TestCase
{
    /** @test */
    public function name(): void
    {
        $magic = new HellFire(
            member: new Member(
                level: 10,
                agility: 10,
                magicAttack: 10,
                vitality: 10,
            ),
        );

        $this->assertSame(
            expected: '地獄の業火',
            actual: $magic->name(),
        );
    }

    /** @test */
    public function costMagicPoint(): void
    {
        $magic = new HellFire(
            member: new Member(
                level: 10,
                agility: 10,
                magicAttack: 10,
                vitality: 10,
            ),
        );

        $this->assertSame(
            expected: 16,
            actual: $magic->costMagicPoint()->value,
        );
    }

    /** @test */
    public function attackPower(): void
    {
        $magic = new HellFire(
            member: new Member(
                level: 10,
                agility: 10,
                magicAttack: 10,
                vitality: 10,
            ),
        );

        $this->assertSame(
            expected: 225,
            actual: $magic->attackPower()->value,
        );
    }

    /** @test */
    public function costTechnicalPoint(): void
    {
        $magic = new HellFire(
            member: new Member(
                level: 10,
                agility: 10,
                magicAttack: 10,
                vitality: 10,
            ),
        );

        $this->assertSame(
            expected: 24,
            actual: $magic->costTechnicalPoint()->value,
        );
    }
}
