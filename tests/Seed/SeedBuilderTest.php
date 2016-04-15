<?php
/**
 * File SeedBuilderTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue48\Tests\Seed;

use PHPWeekly\Issue48\Seed\AbstractSeed;
use PHPWeekly\Issue48\Seed\SeedBuilder;

/**
 * Class SeedBuilderTest
 *
 * @coversDefaultClass PHPWeekly\Issue48\Seed\SeedBuilder
 *
 * @package PHPWeekly\Issue48\Seed
 */
class SeedBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::build
     */
    public function testBuild()
    {
        $seed = SeedBuilder::build(10);

        $this->assertInstanceOf(AbstractSeed::class, $seed);
        $this->assertEquals(10, strlen($seed));
    }

    /**
     * @covers ::build
     * @dataProvider buildExceptionDataProvider
     * @expectedException \OutOfBoundsException
     *
     * @param int $length
     */
    public function testBuildException(int $length)
    {
        SeedBuilder::build($length);
    }

    /**
     * @return array
     */
    public function buildExceptionDataProvider()
    {
        return [
            'min' => [3],
            'max' => [37],
            'six' => [6],
        ];
    }
}
