<?php

declare(strict_types=1);

namespace reactivestudio\s3\commands;

use reactivestudio\s3\commands\base\AbstractExecutableCommand;
use reactivestudio\s3\commands\interfaces\AclCommandInterface;
use reactivestudio\s3\commands\interfaces\AsyncCommandInterface;
use reactivestudio\s3\commands\interfaces\BucketCommandInterface;
use reactivestudio\s3\commands\interfaces\PlainCommandInterface;
use reactivestudio\s3\commands\traits\Async;
use reactivestudio\s3\commands\traits\Options;

/**
 * Class PutCommand
 * @package reactivestudio\s3\commands
 */
class PutCommand extends AbstractExecutableCommand
    implements PlainCommandInterface, BucketCommandInterface, AclCommandInterface, AsyncCommandInterface
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
     * @return PutCommand
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
     * @return PutCommand
     */
    public function withFilename(string $filename): self
    {
        $this->args['Key'] = $filename;
        return $this;
    }

    /**
     * @return string
     */
    public function getAcl(): string
    {
        return $this->args['ACL'] ?? '';
    }

    /**
     * @param string $acl
     * @return PutCommand
     */
    public function withAcl(string $acl): self
    {
        $this->args['ACL'] = $acl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->args['Body'] ?? null;
    }

    /**
     * @param mixed $body
     * @return PutCommand
     */
    public function withBody($body): self
    {
        $this->args['Body'] = $body;
        return $this;
    }

    /**
     * @return array
     */
    public function getMetadata(): array
    {
        return $this->args['Metadata'] ?? [];
    }

    /**
     * @param array $metadata
     * @return PutCommand
     */
    public function withMetadata(array $metadata): self
    {
        $this->args['Metadata'] = $metadata;
        return $this;
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->args['ContentType'] ?? '';
    }

    /**
     * @param string $contentType
     * @return PutCommand
     */
    public function withContentType(string $contentType): self
    {
        $this->args['ContentType'] = $contentType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpiration()
    {
        return $this->args['Expires'] ?? null;
    }

    /**
     * @param mixed $expires
     * @return PutCommand
     */
    public function withExpiration($expires): self
    {
        $this->args['Expires'] = $expires;
        return $this;
    }

    /**
     * @internal used by the handlers
     * @return string
     */
    public function getName(): string
    {
        return 'PutObject';
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

