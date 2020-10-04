<?php

declare(strict_types=1);

namespace reactivestudio\s3\commands;

use reactivestudio\s3\commands\base\AbstractExecutableCommand;
use reactivestudio\s3\commands\interfaces\AclCommandInterface;
use reactivestudio\s3\commands\interfaces\AsyncCommandInterface;
use reactivestudio\s3\commands\interfaces\BucketCommandInterface;
use reactivestudio\s3\commands\traits\Async;

/**
 * Class UploadCommand
 * @package reactivestudio\s3\commands
 */
class UploadCommand extends AbstractExecutableCommand
    implements BucketCommandInterface, AclCommandInterface, AsyncCommandInterface
{
    use Async;

    /**
     * @var string
     */
    protected $bucket;

    /**
     * @var string
     */
    protected $acl;

    /**
     * @var mixed
     */
    protected $source;

    /**
     * @var string
     */
    protected $filename;

    /**
     * @var array
     */
    protected $options = [];

    /**
     * @return string
     */
    public function getBucket(): string
    {
        return (string)$this->bucket;
    }

    /**
     * @param string $name
     * @return UploadCommand
     */
    public function inBucket(string $name): self
    {
        $this->bucket = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getAcl(): string
    {
        return (string)$this->acl;
    }

    /**
     * @param string $acl
     * @return UploadCommand
     */
    public function withAcl(string $acl): self
    {
        $this->acl = $acl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param mixed $source
     * @return UploadCommand
     */
    public function withSource($source): self
    {
        $this->source = $source;
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
     * @return UploadCommand
     */
    public function withFilename(string $filename): self
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @return int
     */
    public function getPartSize(): int
    {
        return $this->options['part_size'] ?? 0;
    }

    /**
     * @param int $partSize
     * @return UploadCommand
     */
    public function withPartSize(int $partSize): self
    {
        $this->options['part_size'] = $partSize;
        return $this;
    }

    /**
     * @return int
     */
    public function getConcurrency(): int
    {
        return $this->options['concurrency'] ?? 0;
    }

    /**
     * @param int $concurrency
     * @return UploadCommand
     */
    public function withConcurrency(int $concurrency): self
    {
        $this->options['concurrency'] = $concurrency;
        return $this;
    }

    /**
     * @return int
     */
    public function getMupThreshold(): int
    {
        return $this->options['mup_threshold'] ?? 0;
    }

    /**
     * @param int $mupThreshold
     * @return UploadCommand
     */
    public function withMupThreshold(int $mupThreshold): self
    {
        $this->options['mup_threshold'] = $mupThreshold;
        return $this;
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->getParam('ContentType', '');
    }

    /**
     * @param string $contentType
     * @return UploadCommand
     */
    public function withContentType(string $contentType): self
    {
        return $this->withParam('ContentType', $contentType);
    }

    /**
     * @return string
     */
    public function getContentDisposition(): string
    {
        return $this->getParam('ContentDisposition', '');
    }

    /**
     * @param string $contentDisposition
     * @return UploadCommand
     */
    public function withContentDisposition(string $contentDisposition): self
    {
        return $this->withParam('ContentDisposition', $contentDisposition);
    }

    /**
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    public function getParam(string $name, $default = null)
    {
        return $this->options['params'][$name] ?? $default;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return UploadCommand
     */
    public function withParam(string $name, $value): self
    {
        $this->options['params'][$name] = $value;
        return $this;
    }

    /**
     * @param callable $beforeUpload
     * @return UploadCommand
     */
    public function beforeUpload(callable $beforeUpload): self
    {
        $this->options['before_upload'] = $beforeUpload;
        return $this;
    }

    /**
     * @internal used by the handlers
     *
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}

