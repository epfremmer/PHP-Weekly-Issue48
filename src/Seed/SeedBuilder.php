<?php
/**
 * File SeedBuilder.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue48\Seed;

/**
 * Class SeedBuilder
 *
 * @package PHPWeekly\Issue48\Seed
 */
class SeedBuilder
{
    const MIN_LENGTH = 4;
    const MAX_LENGTH = 36;

    /**
     * Build a new seed
     *
     * @param int $length
     * @return AbstractSeed
     */
    public static function build($length) : AbstractSeed
    {
        $length = (int) $length;

        if ($length < self::MIN_LENGTH || $length > self::MAX_LENGTH) {
            throw new \OutOfBoundsException(
                sprintf('Seed greater than base %s or less than base %s not allowed', self::MIN_LENGTH, self::MAX_LENGTH)
            );
        }

        if ($length === 6) {
            throw new \OutOfBoundsException('Base 6 seeds cannot be self described');
        }

        return new Seed($length);
    }
}
