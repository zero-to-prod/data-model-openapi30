<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public static string $test_dir = './tests/generated';

    protected function setUp(): void
    {
        parent::setUp();

        exec(
            (stripos(PHP_OS_FAMILY, 'WIN') === 0
                ? 'rmdir /S /Q '
                : 'rm -rf ').self::$test_dir
        );
    }
}