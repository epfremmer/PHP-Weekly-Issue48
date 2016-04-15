<?php
/**
 * File SelfDescribingNumberValidator.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue48\Validator;

use PHPWeekly\Issue48\Seed\Map\CharMap;

/**
 * Class SelfDescribingNumberValidator
 *
 * @package PHPWeekly\Issue48\Validator
 */
class SelfDescribingNumberValidator
{
    /**
     * Test if the string is a self describing number
     *
     * @param string $number
     * @return bool
     */
    public function isValid(string $number) : bool
    {
        $values = array_map([CharMap::class, 'value'], str_split($number));

        if (array_sum($values) % strlen($number)) {
            return false;
        }

        foreach (count_chars($number, 1) as $char => $count) {
            $index = CharMap::value(chr($char));

            if ($count != CharMap::value($number[$index])) {
                return false;
            }
        }

        return true;
    }
}
