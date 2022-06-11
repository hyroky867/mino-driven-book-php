<?php

declare(strict_types=1);

namespace Test\Part6;

use App\Part6\MagicManager;
use App\Part6\MagicType;
use App\Part6\Member;
use PHPUnit\Framework\TestCase;

class MagicManagerTest extends TestCase
{
    private MagicManager $manager;

    protected function setUp(): void
    {
        parent::setUp();
        $this->manager = new MagicManager();
    }

    /** @test */
    public function getName_炎の魔法の名前が取得できるべき(): void
    {
        $actual = $this->manager->getName(magicType: MagicType::FIRE);

        $this->assertSame(
            expected: 'ファイア',
            actual: $actual,
        );
    }

    /** @test */
    public function getName_雷の魔法の名前が取得できるべき(): void
    {
        $actual = $this->manager->getName(magicType: MagicType::SHIDEN);

        $this->assertSame(
            expected: '紫電',
            actual: $actual,
        );
    }

    /** @test */
    public function costMagicPoint_炎の魔法の場合(): void
    {
        $level = 10;
        $actual = $this->manager->costMagicPoint(
            magicType: MagicType::FIRE,
            member: new Member(
                level: $level,
                agility: 999999,
                magicAttack: 888888,
                vitality: 777777,
            ),
        );

        $this->assertSame(
            expected: 2,
            actual: $actual,
        );
    }

    /** @test */
    public function costMagicPoint_雷の魔法の場合(): void
    {
        $level = 10;
        $actual = $this->manager->costMagicPoint(
            magicType: MagicType::SHIDEN,
            member: new Member(
                level: $level,
                agility: 999999,
                magicAttack: 888888,
                vitality: 777777,
            ),
        );

        $this->assertSame(
            expected: 7,
            actual: $actual,
        );
    }

    /** @test */
    public function attackPower_炎の魔法の場合(): void
    {
        $level = 10;
        $actual = $this->manager->attackPower(
            magicType: MagicType::FIRE,
            member: new Member(
                level: $level,
                agility: 999999,
                magicAttack: 888888,
                vitality: 777777,
            ),
        );

        $this->assertSame(
            expected: 25,
            actual: $actual,
        );
    }

    /** @test */
    public function attackPower_雷の魔法の場合(): void
    {
        $agility = 10;
        $actual = $this->manager->attackPower(
            magicType: MagicType::SHIDEN,
            member: new Member(
                level: 999999,
                agility: $agility,
                magicAttack: 888888,
                vitality: 777777,
            ),
        );

        $this->assertSame(
            expected: 65,
            actual: $actual,
        );
    }
}
