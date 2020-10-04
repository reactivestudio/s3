<?php

declare(strict_types=1);

namespace reactivestudio\s3\interfaces;

use reactivestudio\s3\commands\interfaces\CommandInterface;

/**
 * Interface HandlerResolverInterface
 * @package reactivestudio\s3\interfaces
 */
interface HandlerResolverInterface
{
    /**
     * @param CommandInterface $command
     * @return HandlerInterface
     */
    public function resolve(CommandInterface $command): HandlerInterface;

    /**
     * @param string $commandClass
     * @param HandlerInterface $handler
     * @return mixed
     */
    public function bindHandler(string $commandClass, HandlerInterface $handler);
}
