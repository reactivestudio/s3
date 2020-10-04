<?php

declare(strict_types=1);

namespace reactivestudio\s3\commands\interfaces;

/**
 * Interface ExecutableCommandInterface
 * @package reactivestudio\s3\commands\interfaces
 */
interface ExecuteCommandInterface extends CommandInterface
{
    /**
     * @return mixed
     */
    public function execute();
}
