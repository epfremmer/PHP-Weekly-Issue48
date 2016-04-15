<?php
/**
 * File SeedTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue48\Tests\Seed;

use PHPWeekly\Issue48\Seed\Map\CharMap;
use PHPWeekly\Issue48\Seed\Seed;

/**
 * Class SeedTest
 *
 * @coversDefaultClass PHPWeekly\Issue48\Seed\Seed
 *
 * @package PHPWeekly\Issue48\Seed
 */
class SeedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::build
     * @dataProvider buildDataProvider
     *
     * @param int $length
     */
    public function testBuild(int $length)
    {
        $seed = new Seed($length);

        $this->assertEquals($length, strlen($seed));

        foreach (str_split($seed) as $char) {
            $this->assertLessThanOrEqual($length - 1, CharMap::value($char));
        }
    }

    /**
     * @return array
     */
    public function buildDataProvider()
    {
        return [
            '10' => [10],
            '16' => [16],
            '36' => [36],
        ];
    }
}
