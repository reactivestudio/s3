<?php

declare(strict_types=1);

namespace reactivestudio\s3\commands;

use reactivestudio\s3\commands\base\AbstractExecutableCommand;
use reactivestudio\s3\commands\interfaces\AsyncCommandInterface;
use reactivestudio\s3\commands\interfaces\BucketCommandInterface;
use reactivestudio\s3\commands\interfaces\PlainCommandInterface;
use reactivestudio\s3\commands\traits\Async;

/**
 * Class RestoreCommand
 * @package reactivestudio\s3\commands
 */
class RestoreCommand extends AbstractExecutableCommand
    implements PlainCommandInterface, BucketCommandInterface, AsyncCommandInterface
{
    use Async;

    /**
     * @var array
     */
    protected $args = [];

    /**
     * @return string
     */
    public function getBucket(): string
    {
        return $this->args['Bucket'] ?? '';
    }

    /**
     * @param string $name
     * @return RestoreCommand
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
     * @return RestoreCommand
     */
    public function byFilename(string $filename): self
    {
        $this->args['Key'] = $filename;
        return $this;
    }

    /**
     * @return int lifetime of the active copy in days
     */
    public function getLifetime(): int
    {
        return $this->args['Days'] ?? 0;
    }

    /**
     * @param int $days lifetime of the active copy in days
     * @return RestoreCommand
     */
    public function withLifetime(int $days): self
    {
        $this->args['Days'] = $days;
        return $this;
    }

    /**
     * @return string
     */
    public function getVersionId(): string
    {
        return $this->args['VersionId'] ?? '';
    }

    /**
     * @param string $versionId
     * @return RestoreCommand
     */
    public function withVersionId(string $versionId): self
    {
        $this->args['VersionId'] = $versionId;
        return $this;
    }

    /**
     * @return string
     * @internal used by the handlers
     *
     */
    public function getName(): string
    {
        return 'RestoreObject';
    }

    /**
     * @return array
     * @internal used by the handlers
     *
     */
    public function toArgs(): array
    {
        return $this->args;
    }
}
