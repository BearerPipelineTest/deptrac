<?php

declare(strict_types=1);

namespace Qossmic\Deptrac\Console\Exception;

use Qossmic\Deptrac\Utils\ExceptionInterface;
use RuntimeException;
use SplFileInfo;
use function sprintf;

final class ConfigFileException extends RuntimeException implements ExceptionInterface
{
    public static function notReadable(SplFileInfo $configFile): self
    {
        return new self(sprintf('Depfile "%s" is not readable.', $configFile->getPathname()));
    }
}
