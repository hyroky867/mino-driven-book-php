<?php

declare(strict_types=1);

namespace App\Part6;

class Magic
{
    public readonly string $name;
    public readonly int $costMagicPoint;
    public readonly int $attackPower;
    public readonly int $costTechnicalPoint;

    public function __construct(
        MagicType $magicType,
        Member $member
    ) {
        $name = '';
        $costMagicPoint = 0;
        $attackPower = 0;
        $costTechnicalPoint = 0;
        switch ($magicType) {
            case MagicType::FIRE:
                $name = 'ファイア';
                $costMagicPoint = 2;
                $attackPower = 20 + (int) ($member->level * 0.5);
                $costTechnicalPoint = 0;
                break;
            case MagicType::SHIDEN:
                $name = '紫電';
                $costMagicPoint = 5 + (int) ($member->level * 0.2);
                $attackPower = 50 + (int) ($member->agility * 1.5);
                $costTechnicalPoint = 5;
                break;
            case MagicType::HELL_FIRE:
                $name = '地獄の業火';
                $costMagicPoint = 16;
                $attackPower = 200 + (int) (($member->magicAttack * 0.5) + ($member->vitality * 2));
                $costTechnicalPoint = 20 + (int) ($member->level * 0.4);
                break;
        }

        $this->name = $name;
        $this->costMagicPoint = $costMagicPoint;
        $this->attackPower = $attackPower;
        $this->costTechnicalPoint = $costTechnicalPoint;
    }
}
