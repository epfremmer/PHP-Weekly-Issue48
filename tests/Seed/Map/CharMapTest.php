<?php
/**
 * File CharMapTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue48\Tests\Seed\Map;

use PHPWeekly\Issue48\Seed\Map\CharMap;

/**
 * Class CharMapTest
 *
 * @coversDefaultClass PHPWeekly\Issue48\Seed\Map\CharMap
 *
 * @package PHPWeekly\Issue48\Tests\Seed\Map
 */
class CharMapTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::value
     * @dataProvider mapDataProvider
     *
     * @param int $value
     * @param string $char
     */
    public function testValue(int $value, string $char)
    {
        $this->assertEquals($value, CharMap::value($char));
    }

    /**
     * @covers ::value
     * @expectedException \OutOfBoundsException
     */
    public function testValueException()
    {
        CharMap::value('_');
    }

    /**
     * @covers ::char
     * @dataProvider mapDataProvider
     *
     * @param int $value
     * @param string $char
     */
    public function testChar(int $value, string $char)
    {
        $this->assertEquals($char, CharMap::char($value));
    }

    /**
     * @covers ::char
     * @expectedException \OutOfBoundsException
     */
    public function testCharException()
    {
        CharMap::char(100);
    }

    /**
     * @return array
     */
    public function mapDataProvider()
    {
        $reflection = new \ReflectionClass(CharMap::class);
        $properties = $reflection->getStaticProperties();

        $data = [];
        foreach ($properties['chars'] as $value => $char) {
            $data[$char] = [$value, $char];
        }

        return $data;
    }
}
