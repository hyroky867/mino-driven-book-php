<?php

declare(strict_types=1);

namespace App\Library;

use InvalidArgumentException;

use function array_key_exists;
use function spl_object_hash;

/** JavaのHashSet的なクラスをPHPで実現しようとしたクラス */
class HashSet implements Set
{
    private readonly Type $type;

    /** @var array<string, object> */
    private array $hashSet = [];

    /**
     * @param class-string $classString
     */
    public function __construct(string $classString)
    {
        $this->type = TypeFactory::makeFromString(value: $classString);
    }

    public function add(object $e): void
    {
        if ($this->type->isSame(other: $e) === false) {
            throw new InvalidArgumentException(message: '型が異なります');
        }
        if ($this->contains(object: $e) === true) {
            return;
        }
        $this->hashSet[spl_object_hash(object: $e)] = $e;
    }

    public function contains(object $object): bool
    {
        if ($this->hashSet === []) {
            return false;
        }
        return array_key_exists(
            key: spl_object_hash(object: $object),
            array: $this->hashSet,
        );
    }

    public function size(): int
    {
        return count($this->hashSet);
    }

    /**
     * @return array<string, object>
     */
    public function getHashSet(): array
    {
        return $this->hashSet;
    }
}
