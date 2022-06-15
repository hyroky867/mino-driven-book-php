<?php

declare(strict_types=1);

namespace Test\Part6\Chapter6;

use App\Part6\Chapter6\HitPointDamage;
use App\Part6\Chapter6\Member;
use PHPUnit\Framework\TestCase;

class HitPointDamageTest extends TestCase
{
    /** @test */
    public function HPがダメージ量よりも多い場合、除算された値が残るべき(): void
    {
        $hitPoint = 100;
        $member = new Member(
            hitPoint: $hitPoint,
            magicPoint: 999999,
        );
        $damage = new HitPointDamage(
            member: $member,
        );

        $decrease = 10;
        $damage->execute(damageAmount: $decrease);

        $this->assertSame(
            expected: $hitPoint - $decrease,
            actual: $member->hitPoint,
        );
    }

    /** @test */
    public function HPがダメージ量よりも少ない場合、0が残るべき(): void
    {
        $member = new Member(
            hitPoint: 100,
            magicPoint: 999999,
        );
        $damage = new HitPointDamage(
            member: $member,
        );

        $damage->execute(damageAmount: 1000);

        $this->assertSame(
            expected: 0,
            actual: $member->hitPoint,
        );
    }
}
