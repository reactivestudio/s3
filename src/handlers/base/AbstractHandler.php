<?php

declare(strict_types=1);

namespace reactivestudio\s3\handlers\base;

use Aws\S3\S3Client;
use reactivestudio\s3\interfaces\HandlerInterface;

/**
 * Class AbstractHandler
 * @package reactivestudio\s3\handlers\base
 */
abstract class AbstractHandler implements HandlerInterface
{
    /**
     * @var S3Client
     */
    protected $s3Client;

    public function __construct(S3Client $s3Client)
    {
        $this->s3Client = $s3Client;
    }
}
