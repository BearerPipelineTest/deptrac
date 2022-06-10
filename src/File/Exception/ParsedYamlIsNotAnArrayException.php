<?php

declare(strict_types=1);

namespace Qossmic\Deptrac\File\Exception;

use Qossmic\Deptrac\Exception\ExceptionInterface;
use RuntimeException;

/**
 * @internal
 */
final class ParsedYamlIsNotAnArrayException extends RuntimeException implements ExceptionInterface
{
    public static function fromFilename(string $filename): self
    {
        return new self(sprintf(
            'File "%s" can be parsed as YAML, but the result is not an array.',
            $filename
        ));
    }
}
