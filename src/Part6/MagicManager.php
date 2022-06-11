<?php

declare(strict_types=1);

namespace App\Part6;

class MagicManager
{
    public function getName(MagicType $magicType): string
    {
        $name = '';
        switch ($magicType) {
            case MagicType::FIRE:
                $name = 'ファイア';
                break;
            case MagicType::SHIDEN:
                $name = '紫電';
                break;
        }
        return $name;
    }

    public function costMagicPoint(
        MagicType $magicType,
        Member $member
    ): int {
        $magicPoint = 0;

        switch ($magicType) {
            case MagicType::FIRE:
                $magicPoint = 2;
                break;
            case MagicType::SHIDEN:
                $magicPoint = 5 + (int) ($member->level * 0.2);
                break;
        }
        return $magicPoint;
    }

    public function attackPower(
        MagicType $magicType,
        Member $member
    ): int {
        $attackPower = 0;

        switch ($magicType) {
            case MagicType::FIRE:
                $attackPower = 20 + (int) ($member->level * 0.5);
                break;
            case MagicType::SHIDEN:
                $attackPower = 50 + (int) ($member->agility * 1.5);
                break;
        }
        return $attackPower;
    }
}
