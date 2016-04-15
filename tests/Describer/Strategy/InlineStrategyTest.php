<?php
/**
 * File InlineStrategy.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue48\Tests\Describer\Strategy;

use PHPWeekly\Issue48\Describer\Strategy;

/**
 * Class InlineStrategy
 *
 * @coversDefaultClass PHPWeekly\Issue48\Describer\Strategy\InlineStrategy
 *
 * @package PHPWeekly\Issue48\Tests\Describer\Strategy
 */
class InlineStrategyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @coversNothing
     */
    public function testInterface()
    {
        $strategy = new Strategy\InlineStrategy();

        $this->assertInstanceOf(Strategy\StrategyInterface::class, $strategy);
    }

    /**
     * @covers ::describe
     */
    public function testDescribe()
    {
        $strategy = new Strategy\InlineStrategy();

        $this->assertEquals('20200', $strategy->describe('22200'));
        $this->assertNotEquals('20300', $strategy->describe('22200'));
    }
}
