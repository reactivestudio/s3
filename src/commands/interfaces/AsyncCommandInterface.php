<?php

declare(strict_types=1);

namespace reactivestudio\s3\commands\interfaces;

/**
 * Interface AsyncCommandInterface
 * @package reactivestudio\s3\commands\interfaces
 */
interface AsyncCommandInterface extends CommandInterface
{
    /**
     * @return mixed
     */
    public function async();

    /**
     * @return bool
     */
    public function isAsync(): bool;
}
