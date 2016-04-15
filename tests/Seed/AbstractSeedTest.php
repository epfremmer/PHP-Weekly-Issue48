<?php
/**
 * File AbstractSeedTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue48\Tests\Seed;

use PHPWeekly\Issue48\Seed\AbstractSeed;

/**
 * Class AbstractSeedTest
 *
 * @coversDefaultClass PHPWeekly\Issue48\Seed\AbstractSeed
 *
 * @package PHPWeekly\Issue48\Seed
 */
class AbstractSeedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AbstractSeed
     */
    private $seed;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->seed = $this->getMockForAbstractClass(AbstractSeed::class, [], '', false);

        $this->seed->expects($this->any())->method('build')->with(10)->willReturn('0000000000');
    }

    /**
     * @covers ::__construct
     */
    public function testConstruct()
    {
        $this->seed->__construct(10);

        $this->assertAttributeEquals('0000000000', 'value', $this->seed);
    }

    /**
     * @covers ::__toString
     */
    public function testToString()
    {
        $this->seed->__construct(10);

        $this->assertEquals('0000000000', (string) $this->seed);
    }
}
