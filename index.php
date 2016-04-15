<?php
/**
 * File index.php.
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */

declare(strict_types=1);

use PHPWeekly\Issue48\Describer\NumberDescriber;
use PHPWeekly\Issue48\Seed\SeedBuilder;
use PHPWeekly\Issue48\Validator\SelfDescribingNumberValidator;

require_once 'vendor/autoload.php';

$length = @$argv[1] ?: 10;

$seed = SeedBuilder::build($length);
$number = (string) $seed;

$validator = new SelfDescribingNumberValidator();
$modifier = new NumberDescriber();

$start = microtime(true);

$iterations = 0;

echo sprintf('Starting: %s', $number) . PHP_EOL;
echo PHP_EOL;

while (!$validator->isValid($number)) {
    $number = $modifier->describe($number);
    $iterations++;

    echo sprintf('Iteration %s = %s', $iterations, $number) . PHP_EOL;
}

echo PHP_EOL;
echo sprintf('Result: %s', $number) . PHP_EOL;
echo sprintf('Iterations: %s', $iterations) . PHP_EOL;
echo sprintf('Runtime: %s ms', (microtime(true) - $start) * 1000) . PHP_EOL;
echo sprintf('Peak Memory: %s bytes', number_format(memory_get_peak_usage(true))) . PHP_EOL;
