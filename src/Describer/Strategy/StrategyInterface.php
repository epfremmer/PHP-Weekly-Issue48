<?php
/**
 * File StrategyInterface.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue48\Describer\Strategy;

/**
 * Interface StrategyInterface
 *
 * @package PHPWeekly\Issue48\Describer\Strategy
 */
interface StrategyInterface
{
    /**
     * Return self-describing number description
     *
     * @see https://en.wikipedia.org/wiki/Self-descriptive_number
     *
     * @param string $number
     * @return string
     */
    public function describe(string $number) : string;
}
