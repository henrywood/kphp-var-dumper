<?php

declare(strict_types=1);

use Yiisoft\VarDumper\VarDumper;

if (!function_exists('__d')) {
    /**
     * Prints variables.
     *
     * @param mixed ...$variables Variables to be dumped.
     *
     * @see \Yiisoft\VarDumper\VarDumper::dump()
     *
     * @psalm-suppress MixedAssignment
     */
    function __d(mixed ...$variables): void
    {
        $highlight = PHP_SAPI !== 'cli';

        foreach ($variables as $variable) {
            VarDumper::dump($variable, 10, $highlight);
            echo $highlight ? '<br>' : PHP_EOL;
        }
    }
}

if (!function_exists('__dd')) {
    /**
     * Prints variables and terminate the current script.
     *
     * @param mixed ...$variables Variables to be dumped.
     *
     * @see \Yiisoft\VarDumper\VarDumper::dump()
     *
     * @psalm-suppress MixedAssignment
     */
    function __dd(mixed ...$variables): void
    {
        __d(...$variables);

        die(0);
    }
}

if (!function_exists('dump')) {
    /**
     * Prints variables and terminate the current script.
     *
     * @param mixed ...$variables Variables to be dumped.
     *
     * @see d()
     *
     * @psalm-suppress MixedAssignment
     */
    function dump(mixed ...$variables): void
    {
        __d(...$variables);
    }
}
