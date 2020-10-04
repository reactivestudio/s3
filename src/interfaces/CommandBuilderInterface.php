<?php

declare(strict_types=1);

namespace reactivestudio\s3\interfaces;

use reactivestudio\s3\commands\interfaces\CommandInterface;

/**
 * Interface CommandBuilderInterface
 * @package reactivestudio\s3\interfaces
 */
interface CommandBuilderInterface
{
    /**
     * @param string $commandClass
     * @return CommandInterface
     */
    public function build(string $commandClass): CommandInterface;
}
