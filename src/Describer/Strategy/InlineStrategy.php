<?php
/**
 * File InlineStrategy.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue48\Describer\Strategy;

use PHPWeekly\Issue48\Seed\Map\CharMap;

/**
 * Class InlineStrategy
 *
 * @package PHPWeekly\Issue48\Describer\Strategy
 */
class InlineStrategy implements StrategyInterface
{
    /**
     * {@inheritdoc}
     */
    public function describe(string $number) : string
    {
        for ($i = 0; $i < strlen($number); $i++) {
            $char = CharMap::char($i);
            $count = substr_count($number, $char);

            $number[$i] = CharMap::char($count);
        }

        return $number;
    }
}
