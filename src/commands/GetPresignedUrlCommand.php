<?php

declare(strict_types=1);

namespace reactivestudio\s3\commands;

use DateTimeInterface;
use reactivestudio\s3\commands\base\AbstractExecutableCommand;
use reactivestudio\s3\commands\interfaces\BucketCommandInterface;

/**
 * Class GetPresignedUrlCommand
 * @package reactivestudio\s3\commands
 */
class GetPresignedUrlCommand extends AbstractExecutableCommand implements BucketCommandInterface
{
    /**
     * @var array
     */
    protected $args = [];

    /**
     * @var mixed
     */
    protected $expiration;

    /**
     * @return string
     */
    public function getBucket(): string
    {
        return $this->args['Bucket'] ?? '';
    }

    /**
     * @param string $name
     * @return GetPresignedUrlCommand
     */
    public function inBucket(string $name): self
    {
        $this->args['Bucket'] = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->args['Key'] ?? '';
    }

    /**
     * @param string $filename
     * @return GetPresignedUrlCommand
     */
    public function byFilename(string $filename): self
    {
        $this->args['Key'] = $filename;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * @param int|string|DateTimeInterface $expiration
     * @return GetPresignedUrlCommand
     */
    public function withExpiration($expiration): self
    {
        $this->expiration = $expiration;
        return $this;
    }

    /**
     * @internal used by the handlers
     * @return array
     */
    public function getArgs(): array
    {
        return $this->args;
    }
}
