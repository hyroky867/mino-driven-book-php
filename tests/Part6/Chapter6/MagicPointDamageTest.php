<?php

declare(strict_types=1);

namespace Test\Part6\Chapter6;

use App\Part6\Chapter6\MagicPointDamage;
use App\Part6\Chapter6\Member;
use PHPUnit\Framework\TestCase;

class MagicPointDamageTest extends TestCase
{
    /** @test */
    public function MPがダメージ量よりも多い場合、除算された値が残るべき(): void
    {
        $magicPoint = 100;
        $member = new Member(
            hitPoint: 999999,
            magicPoint: $magicPoint,
        );
        $damage = new MagicPointDamage(
            member: $member,
        );

        $decrease = 10;
        $damage->execute(damageAmount: $decrease);

        $this->assertSame(
            expected: $magicPoint - $decrease,
            actual: $member->magicPoint,
        );
    }

    /** @test */
    public function MPがダメージ量よりも少ない場合、0が残るべき(): void
    {
        $member = new Member(
            hitPoint: 999999,
            magicPoint: 100,
        );
        $damage = new MagicPointDamage(
            member: $member,
        );

        $damage->execute(damageAmount: 1000);

        $this->assertSame(
            expected: 0,
            actual: $member->magicPoint,
        );
    }
}
