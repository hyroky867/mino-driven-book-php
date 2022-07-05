<?php

declare(strict_types=1);

namespace Test\Part9\Chapter6;

use App\Part9\Chapter6\Equipment;
use App\Part9\Chapter6\Member;
use PHPUnit\Framework\TestCase;

class MemberTest extends TestCase
{
    /** @test */
    public function totalDefence(): void
    {
        $member_defence = 10;
        $head_defense = 10;
        $body_defense = 10;
        $arm_defence = 10;

        $member = new Member(
            head: new Equipment(
                name: 'head',
                price: 999999,
                defence: $head_defense,
                magicDefence: 888888,
            ),
            body: new Equipment(
                name: 'body',
                price: 999999,
                defence: $body_defense,
                magicDefence: 888888,
            ),
            arm: new Equipment(
                name: 'arm',
                price: 999999,
                defence: $arm_defence,
                magicDefence: 888888,
            ),
            defence: $member_defence,
        );

        $this->assertSame(
            expected: $member_defence + $head_defense + $body_defense + $arm_defence,
            actual: $member->totalDefence(),
        );
    }
}
