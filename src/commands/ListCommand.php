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
 * Class ListCommand
 * @package reactivestudio\s3\commands
 */
class ListCommand extends AbstractExecutableCommand
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
     * @return ListCommand
     */
    public function inBucket(string $name): self
    {
        $this->args['Bucket'] = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->args['Prefix'] ?? '';
    }

    /**
     * @param string $prefix
     * @return ListCommand
     */
    public function byPrefix(string $prefix): self
    {
        $this->args['Prefix'] = $prefix;
        return $this;
    }

    /**
     * @internal used by the handlers
     * @return string
     */
    public function getName(): string
    {
        return 'ListObjects';
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

