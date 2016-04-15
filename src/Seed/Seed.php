<?php
/**
 * File Seed.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue48\Seed;

/**
 * Class Seed
 *
 * @package PHPWeekly\Issue48\Seed
 */
class Seed extends AbstractSeed
{
    /**
     * {@inheritdoc}
     */
    protected function build(int $length) : string
    {
        $seed = '';

        for ($i = 0; $i < $length; $i++) {
            $seed .= Map\CharMap::char(mt_rand(0, $length - 1));
        }

        return $seed;
    }
}
