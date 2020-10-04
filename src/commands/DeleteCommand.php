<?php

declare(strict_types=1);

namespace reactivestudio\s3\commands;

use reactivestudio\s3\commands\base\AbstractExecutableCommand;
use reactivestudio\s3\commands\interfaces\AsyncCommandInterface;
use reactivestudio\s3\commands\interfaces\BucketCommandInterface;
use reactivestudio\s3\commands\interfaces\PlainCommandInterface;
use reactivestudio\s3\commands\traits\Async;
use reactivestudio\s3\commands\traits\Options;

/**
 * Class DeleteCommand
 * @package reactivestudio\s3\commands
 */
class DeleteCommand extends AbstractExecutableCommand
    implements PlainCommandInterface, BucketCommandInterface, AsyncCommandInterface
{
    use Async;
    use Options;

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
     * @return DeleteCommand
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
     * @return DeleteCommand
     */
    public function byFilename(string $filename): self
    {
        $this->args['Key'] = $filename;
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
     * @return DeleteCommand
     */
    public function withVersionId(string $versionId): self
    {
        $this->args['VersionId'] = $versionId;
        return $this;
    }

    /**
     * @return string
     * @internal used by the handlers
     */
    public function getName(): string
    {
        return 'DeleteObject';
    }

    /**
     * @return array
     * @internal used by the handlers
     *
     */
    public function toArgs(): array
    {
        return array_replace($this->options, $this->args);
    }
}
