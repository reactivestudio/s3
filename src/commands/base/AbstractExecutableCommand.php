<?php

declare(strict_types=1);

namespace reactivestudio\s3\commands\base;

use reactivestudio\s3\commands\interfaces\ExecuteCommandInterface;
use reactivestudio\s3\interfaces\S3BusInterface;

abstract class AbstractExecutableCommand implements ExecuteCommandInterface
{
    /**
     * @var S3BusInterface
     */
    private $bus;

    public function __construct(S3BusInterface $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        return $this->bus->execute($this);
    }
}
