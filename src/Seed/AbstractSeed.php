<?php
/**
 * File AbstractSeed.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue48\Seed;

/**
 * Class AbstractSeed
 *
 * @package PHPWeekly\Issue48\Seed
 */
abstract class AbstractSeed
{
    /**
     * @var string
     */
    protected $value;

    /**
     * AbstractSeed constructor
     *
     * @param int $length
     */
    public function __construct(int $length)
    {
        $this->value = $this->build($length);
    }

    /**
     * Return seed string
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value;
    }

    /**
     * Build and return seed string
     *
     * @param int $length
     * @return string
     */
    abstract protected function build(int $length) : string;
}
