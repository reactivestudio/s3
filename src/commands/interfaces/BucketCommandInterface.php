<?php

declare(strict_types=1);

namespace reactivestudio\s3\commands\interfaces;

/**
 * Interface BucketCommandInterface
 * @package reactivestudio\s3\commands\interfaces
 */
interface BucketCommandInterface
{
    /**
     * @param string $name
     */
    public function inBucket(string $name);
}
