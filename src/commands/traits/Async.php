<?php

declare(strict_types=1);

namespace reactivestudio\s3\commands\traits;

/**
 * Trait Async
 * @package reactivestudio\s3\commands\traits
 */
trait Async
{
    /**
     * @var bool
     */
    private $isAsync = false;

    final public function async()
    {
        $this->isAsync = true;
        return $this;
    }

    /**
     * @return bool
     */
    final public function isAsync(): bool
    {
        return $this->isAsync;
    }
}
