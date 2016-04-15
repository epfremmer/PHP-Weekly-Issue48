<?php
/**
 * File NumberDescriberTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue48\Tests\Describer;

use PHPWeekly\Issue48\Describer\NumberDescriber;
use PHPWeekly\Issue48\Describer\Strategy;

/**
 * Class NumberDescriberTest
 *
 * @coversDefaultClass PHPWeekly\Issue48\Describer\NumberDescriber
 *
 * @package PHPWeekly\Issue48\Tests\Describer
 */
class NumberDescriberTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstruct()
    {
        $describer = new NumberDescriber();

        $this->assertAttributeInstanceOf(Strategy\InlineStrategy::class, 'strategy', $describer);
        $this->assertAttributeEquals([], 'descriptions', $describer);
    }

    /**
     * @covers ::describe
     */
    public function testDescribe()
    {
        $describer = new NumberDescriber();

        $this->assertEquals('900000000', $describer->describe('000000000'));
        $this->assertEquals('800000001', $describer->describe('900000000'));
        $this->assertEquals('710000010', $describer->describe('800000010'));
        $this->assertEquals('621000100', $describer->describe('710000100'));
        $this->assertEquals('521001000', $describer->describe('621001000'));
        $this->assertEquals('521001000', $describer->describe('521001000')); // no change - completed
    }

    /**
     * @covers ::describe
     * @covers ::nextStrategy
     */
    public function testDescribeStrategyIteration()
    {
        $describer = new NumberDescriber();

        $this->assertEquals('50000', $describer->describe('00000'));
        $this->assertEquals('31010', $describer->describe('40001'));

        // start of circular pattern
        $this->assertEquals('22200', $describer->describe('31010'));
        $this->assertEquals('20200', $describer->describe('22200')); // <- same
        $this->assertEquals('30110', $describer->describe('20200'));
        $this->assertEquals('22200', $describer->describe('30110'));

        // duplicate number description encountered
        $this->assertEquals('20300', $describer->describe('22200')); // <- same

        // assert describer strategy has changed
        $this->assertAttributeInstanceOf(Strategy\FullStrategy::class, 'strategy', $describer);
        $this->assertAttributeEquals([22200 => '20300'], 'descriptions', $describer);

        $this->assertEquals('30110', $describer->describe('20300'));
        $this->assertEquals('22010', $describer->describe('30110'));
        $this->assertEquals('21200', $describer->describe('22010'));
        $this->assertEquals('21200', $describer->describe('21200')); // no change - completed
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testNonDescribableNumberException()
    {
        $describer = new NumberDescriber();

        $this->assertEquals('600000', $describer->describe('000000'));
        $this->assertEquals('500001', $describer->describe('600000'));
        $this->assertEquals('410010', $describer->describe('500001'));
        $this->assertEquals('321100', $describer->describe('410010'));
        $this->assertEquals('222000', $describer->describe('321100')); // <- same
        $this->assertEquals('301100', $describer->describe('222000'));
        $this->assertEquals('321100', $describer->describe('301100'));

        // duplicate number description encountered
        $this->assertEquals('221100', $describer->describe('321100')); // <- same

        // describer strategy changed
        $this->assertEquals('222000', $describer->describe('221100'));
        $this->assertEquals('303000', $describer->describe('222000'));
        $this->assertEquals('400200', $describer->describe('303000'));
        $this->assertEquals('401010', $describer->describe('400200'));
        $this->assertEquals('320010', $describer->describe('401010'));
        $this->assertEquals('311100', $describer->describe('320010'));
        $this->assertEquals('230100', $describer->describe('311100')); // <- same
        $this->assertEquals('311100', $describer->describe('230100'));

        // all patterns exhausted - throw exception
        $this->assertEquals('ERROR ', $describer->describe('311100')); // <- same
    }
}
