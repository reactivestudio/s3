<?php

declare(strict_types=1);

namespace reactivestudio\s3\commands\traits;

/**
 * Trait Options
 * @package reactivestudio\s3\commands\traits
 */
trait Options
{
    /**
     * @var array
     */
    protected $options = [];

    final public function withOptions(array $value)
    {
        $this->options = $value;
        return $this;
    }

    /**
     * @return array
     */
    final public function getOptions(): array
    {
        return $this->options;
    }

    final public function withOption(string $name, $value)
    {
        $this->options[$name] = $value;
        return $this;
    }
}
