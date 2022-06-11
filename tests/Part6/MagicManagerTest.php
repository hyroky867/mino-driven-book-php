<?php

declare(strict_types=1);

namespace Test\Part6;

use App\Part6\MagicManager;
use App\Part6\MagicType;
use PHPUnit\Framework\TestCase;

class MagicManagerTest extends TestCase
{
    /** @test */
    public function getName_炎の魔法の名前が取得できるべき(): void
    {
        $manager = new MagicManager();
        $actual = $manager->getName(magicType: MagicType::FIRE);

        $this->assertSame(
            expected: 'ファイア',
            actual: $actual,
        );
    }

    /** @test */
    public function getName_雷の魔法の名前が取得できるべき(): void
    {
        $manager = new MagicManager();
        $actual = $manager->getName(magicType: MagicType::SHIDEN);

        $this->assertSame(
            expected: '紫電',
            actual: $actual,
        );
    }
}
