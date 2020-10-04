<?php

declare(strict_types=1);

namespace reactivestudio\s3\commands;

use reactivestudio\s3\commands\base\AbstractExecutableCommand;
use reactivestudio\s3\commands\interfaces\BucketCommandInterface;

/**
 * Class GetUrlCommand
 * @package reactivestudio\s3\commands
 */
class GetUrlCommand extends AbstractExecutableCommand implements BucketCommandInterface
{
    /**
     * @var string
     */
    protected $bucket;

    /**
     * @var string
     */
    protected $filename;

    /**
     * @return string
     */
    public function getBucket(): string
    {
        return (string)$this->bucket;
    }

    /**
     * @param string $name
     * @return GetUrlCommand
     */
    public function inBucket(string $name): self
    {
        $this->bucket = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return (string)$this->filename;
    }

    /**
     * @param string $filename
     * @return GetUrlCommand
     */
    public function byFilename(string $filename): self
    {
        $this->filename = $filename;
        return $this;
    }
}
