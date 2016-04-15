<?php
/**
 * File FullStrategy.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue48\Tests\Describer\Strategy;

use PHPWeekly\Issue48\Describer\Strategy;

/**
 * Class FullStrategy
 *
 * @coversDefaultClass PHPWeekly\Issue48\Describer\Strategy\FullStrategy
 *
 * @package PHPWeekly\Issue48\Tests\Describer\Strategy
 */
class FullStrategyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @coversNothing
     */
    public function testInterface()
    {
        $strategy = new Strategy\FullStrategy();

        $this->assertInstanceOf(Strategy\StrategyInterface::class, $strategy);
    }

    /**
     * @covers ::describe
     */
    public function testDescribe()
    {
        $strategy = new Strategy\FullStrategy();

        $this->assertEquals('20300', $strategy->describe('22200'));
        $this->assertNotEquals('20200', $strategy->describe('22200'));
    }
}
