<?php

declare(strict_types=1);

namespace reactivestudio\s3\interfaces;

use reactivestudio\s3\commands\interfaces\CommandInterface;

/**
 * Interface S3ServiceInterface
 * @package reactivestudio\s3\interfaces
 */
interface S3ServiceInterface
{
    public function execute(CommandInterface $command);
    public function create(string $commandClass): CommandInterface;
}
