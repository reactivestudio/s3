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
 * Class GetCommand
 * @package reactivestudio\s3\commands
 */
class GetCommand extends AbstractExecutableCommand
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
     * @return GetCommand
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
     * @return GetCommand
     */
    public function byFilename(string $filename): self
    {
        $this->args['Key'] = $filename;
        return $this;
    }

    /**
     * @param string $value
     * @return GetCommand
     */
    public function saveAs(string $value): self
    {
        $this->args['SaveAs'] = $value;
        return $this;
    }

    /**
     * @param string $ifMatch
     * @return GetCommand
     */
    public function ifMatch(string $ifMatch): self
    {
        $this->args['IfMatch'] = $ifMatch;
        return $this;
    }

    /**
     * @internal used by the handlers
     * @return string
     */
    public function getName(): string
    {
        return 'GetObject';
    }

    /**
     * @internal used by the handlers
     * @return array
     */
    public function toArgs(): array
    {
        return array_replace($this->options, $this->args);
    }
}
