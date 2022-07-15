<?php

declare(strict_types=1);

namespace Tests\Qossmic\Deptrac\Utils;

use PHPUnit\Framework\TestCase;
use Qossmic\Deptrac\Supportive\File\Exception\CouldNotReadFileException;
use Qossmic\Deptrac\Supportive\File\Exception\FileCannotBeParsedAsYamlException;
use Qossmic\Deptrac\Supportive\File\Exception\ParsedYamlIsNotAnArrayException;
use Qossmic\Deptrac\Supportive\File\YmlFileLoader;

/**
 * @covers \Qossmic\Deptrac\Supportive\File\YmlFileLoader
 */
final class YmlFileLoaderTest extends TestCase
{
    public function testLoadThrowsFileDoesNotExistsExceptionWhenFileDoesNotExist(): void
    {
        $file = __DIR__.'/Fixtures/non-existent-file.yaml';

        $loader = new YmlFileLoader();

        $this->expectException(CouldNotReadFileException::class);

        $loader->parseFile($file);
    }

    public function testLoadThrowsFileCannotBeParsedAsYamlExceptionWhenFileDoesNotContainYaml(): void
    {
        $file = __FILE__;

        $loader = new YmlFileLoader();

        $this->expectException(FileCannotBeParsedAsYamlException::class);

        $loader->parseFile($file);
    }

    public function testSyntaxErrorDetailsPrinted(): void
    {
        $file = __DIR__.'/Fixtures/depfile-syntax-error.yaml';

        $loader = new YmlFileLoader();

        $this->expectException(FileCannotBeParsedAsYamlException::class);
        $this->expectExceptionMessageMatches('/.*Duplicate key "ViewModel" detected at line.*/');

        $loader->parseFile($file);
    }

    public function testLoadThrowsParsedYamlIsNotAnArrayExceptionWhenFileDoesNotContainYamlThatCanBeParsedToAnArray(): void
    {
        $file = __DIR__.'/Fixtures/does-not-contain-array.yml';

        $loader = new YmlFileLoader();

        $this->expectException(ParsedYamlIsNotAnArrayException::class);

        $loader->parseFile($file);
    }
}
