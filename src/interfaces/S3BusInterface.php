<?php

declare(strict_types=1);

namespace reactivestudio\s3\interfaces;

use reactivestudio\s3\commands\interfaces\CommandInterface;

/**
 * Interface S3BusInterface
 * @package reactivestudio\s3\interfaces
 */
interface S3BusInterface
{
    /**
     * @param CommandInterface $command
     * @return mixed
     */
    public function execute(CommandInterface $command);
}
