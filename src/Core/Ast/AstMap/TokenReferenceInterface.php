<?php

declare(strict_types=1);

namespace Qossmic\Deptrac\Core\Ast\AstMap;

use Qossmic\Deptrac\Core\Ast\AstMap\File\FileReference;

interface TokenReferenceInterface
{
    public function getFileReference(): ?FileReference;

    public function getToken(): TokenInterface;
}
