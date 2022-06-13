<?php

declare(strict_types=1);

namespace Test\Part6;

use App\Part6\Member;
use App\Part6\Shiden;
use PHPUnit\Framework\TestCase;

class ShidenTest extends TestCase
{
    /** @test */
    public function name(): void
    {
        $magic = new Shiden(
            member: new Member(
                level: 10,
                agility: 10,
                magicAttack: 10,
                vitality: 10,
            ),
        );

        $this->assertSame(
            expected: '紫電',
            actual: $magic->name(),
        );
    }

    /** @test */
    public function costMagicPoint(): void
    {
        $magic = new Shiden(
            member: new Member(
                level: 10,
                agility: 10,
                magicAttack: 10,
                vitality: 10,
            ),
        );

        $this->assertSame(
            expected: 7,
            actual: $magic->costMagicPoint()->value,
        );
    }

    /** @test */
    public function attackPower(): void
    {
        $magic = new Shiden(
            member: new Member(
                level: 10,
                agility: 10,
                magicAttack: 10,
                vitality: 10,
            ),
        );

        $this->assertSame(
            expected: 65,
            actual: $magic->attackPower()->value,
        );
    }

    /** @test */
    public function costTechnicalPoint(): void
    {
        $magic = new Shiden(
            member: new Member(
                level: 10,
                agility: 10,
                magicAttack: 10,
                vitality: 10,
            ),
        );

        $this->assertSame(
            expected: 5,
            actual: $magic->costTechnicalPoint()->value,
        );
    }
}
