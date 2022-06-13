<?php

declare(strict_types=1);

namespace Test\Part6;

use App\Part6\Fire;
use App\Part6\Member;
use PHPUnit\Framework\TestCase;

class FireTest extends TestCase
{
    /** @test */
    public function name(): void
    {
        $magic = new Fire(
            member: new Member(
                level: 10,
                agility: 10,
                magicAttack: 10,
                vitality: 10,
            ),
        );

        $this->assertSame(
            expected: 'ファイア',
            actual: $magic->name(),
        );
    }

    /** @test */
    public function costMagicPoint(): void
    {
        $magic = new Fire(
            member: new Member(
                level: 10,
                agility: 10,
                magicAttack: 10,
                vitality: 10,
            ),
        );

        $this->assertSame(
            expected: 2,
            actual: $magic->costMagicPoint()->value,
        );
    }

    /** @test */
    public function attackPower(): void
    {
        $magic = new Fire(
            member: new Member(
                level: 10,
                agility: 10,
                magicAttack: 10,
                vitality: 10,
            ),
        );

        $this->assertSame(
            expected: 25,
            actual: $magic->attackPower()->value,
        );
    }

    /** @test */
    public function costTechnicalPoint(): void
    {
        $magic = new Fire(
            member: new Member(
                level: 10,
                agility: 10,
                magicAttack: 10,
                vitality: 10,
            ),
        );

        $this->assertSame(
            expected: 0,
            actual: $magic->costTechnicalPoint()->value,
        );
    }
}
