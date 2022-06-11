<?php

declare(strict_types=1);

namespace Test\Part6;

use App\Part6\Magic;
use App\Part6\MagicType;
use App\Part6\Member;
use PHPUnit\Framework\TestCase;

class MagicTest extends TestCase
{
    /** @test */
    public function FIREの場合値がセットでき取得できるべき(): void
    {
        $magic = new Magic(
            magicType: MagicType::FIRE,
            member: new Member(
                level: 10,
                agility: 10,
                magicAttack: 10,
                vitality: 10,
            ),
        );

        $this->assertSame(
            expected: 'ファイア',
            actual: $magic->name,
        );
        $this->assertSame(
            expected: 2,
            actual: $magic->costMagicPoint,
        );
        $this->assertSame(
            expected: 25,
            actual: $magic->attackPower,
        );
        $this->assertSame(
            expected: 0,
            actual: $magic->costTechnicalPoint,
        );
    }

    /** @test */
    public function SHIDENの場合値がセットでき取得できるべき(): void
    {
        $magic = new Magic(
            magicType: MagicType::SHIDEN,
            member: new Member(
                level: 10,
                agility: 10,
                magicAttack: 10,
                vitality: 10,
            ),
        );

        $this->assertSame(
            expected: '紫電',
            actual: $magic->name,
        );
        $this->assertSame(
            expected: 7,
            actual: $magic->costMagicPoint,
        );
        $this->assertSame(
            expected: 65,
            actual: $magic->attackPower,
        );
        $this->assertSame(
            expected: 5,
            actual: $magic->costTechnicalPoint,
        );
    }

    /** @test */
    public function HELL_FIREの場合値がセットでき取得できるべき(): void
    {
        $magic = new Magic(
            magicType: MagicType::HELL_FIRE,
            member: new Member(
                level: 10,
                agility: 10,
                magicAttack: 10,
                vitality: 10,
            ),
        );

        $this->assertSame(
            expected: '地獄の業火',
            actual: $magic->name,
        );
        $this->assertSame(
            expected: 16,
            actual: $magic->costMagicPoint,
        );
        $this->assertSame(
            expected: 225,
            actual: $magic->attackPower,
        );
        $this->assertSame(
            expected: 24,
            actual: $magic->costTechnicalPoint,
        );
    }
}
