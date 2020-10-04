<?php

declare(strict_types=1);

namespace reactivestudio\s3\commands\interfaces;

/**
 * Interface PlainCommandInterface
 * @package reactivestudio\s3\commands\interfaces
 */
interface PlainCommandInterface extends CommandInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return array
     */
    public function toArgs(): array;
}
