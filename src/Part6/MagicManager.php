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
}
