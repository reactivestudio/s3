<?php

declare(strict_types=1);

namespace reactivestudio\s3\commands\interfaces;

/**
 * Interface AclCommandInterface
 * @package reactivestudio\s3\commands\interfaces
 */
interface AclCommandInterface
{
    /**
     * @param string $acl
     */
    public function withAcl(string $acl);
}
