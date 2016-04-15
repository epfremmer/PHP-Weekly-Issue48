<?php
/**
 * File FullStrategy.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue48\Describer\Strategy;

use PHPWeekly\Issue48\Seed\Map\CharMap;

/**
 * Class FullStrategy
 *
 * @package PHPWeekly\Issue48\Describer\Strategy
 */
class FullStrategy implements StrategyInterface
{
    /**
     * {@inheritdoc}
     */
    public function describe(string $number) : string
    {
        $counts = count_chars($number, 1);
        $result = str_repeat('0', strlen($number));

        foreach ($counts as $char => $count) {
            $index = CharMap::value(chr($char));

            $result[$index] = CharMap::char($count);
        }

        return $result;
    }
}
