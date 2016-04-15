<?php
/**
 * File SelfDescribingNumberValidatorTest.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue48\Tests;

use PHPWeekly\Issue48\Validator\SelfDescribingNumberValidator;

/**
 * Class SelfDescribingNumberValidatorTest
 *
 * @coversDefaultClass PHPWeekly\Issue48\Validator\SelfDescribingNumberValidator
 *
 * @package PHPWeekly\Issue48\Tests
 */
class SelfDescribingNumberValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::isValid
     * @dataProvider isValidProvider
     *
     * @param string $number
     * @param bool $expected
     */
    public function testIsValid(string $number, bool $expected)
    {
        $validator = new SelfDescribingNumberValidator();

        $this->assertEquals($expected, $validator->isValid($number));
    }

    /**
     * @return array
     */
    public function isValidProvider()
    {
        return [
            // valid tests
            'base 4a' => ['1210', true],
            'base 4b' => ['2020', true],
            'base 5 ' => ['21200', true],
            'base 7 ' => ['3211000', true],
            'base 8 ' => ['42101000', true],
            'base 9 ' => ['521001000', true],
            'base 10' => ['6210001000', true],
            'base 11' => ['72100001000', true],
            'base 12' => ['821000001000', true],
            'base 16' => ['c210000000001000', true],
            'base 36' => ['w21000000000000000000000000000001000', true],

            // not valid tests
            'base 10 fail a' => ['6210001400', false],
            'base 10 fail b' => ['6210001001', false],
        ];
    }
}
