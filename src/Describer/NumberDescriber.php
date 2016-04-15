<?php
/**
 * File NumberDescriber.php
 *
 * @author Edward Pfremmer <epfremme@nerdery.com>
 */
namespace PHPWeekly\Issue48\Describer;

/**
 * Class NumberDescriber
 *
 * @package PHPWeekly\Issue48\Describer
 */
class NumberDescriber
{
    /**
     * @var array
     */
    private $descriptions = [];

    /**
     * @var array|string[]
     */
    private $strategies = [
        Strategy\InlineStrategy::class,
        Strategy\FullStrategy::class,
    ];

    /**
     * @var Strategy\StrategyInterface
     */
    private $strategy;

    /**
     * NumberDescriber constructor
     */
    public function __construct()
    {
        $strategy = reset($this->strategies);
        $this->strategy = new $strategy();
    }

    /**
     * Describe number by mapping character counts to the string index
     * equal to that characters numeric value
     *
     * @param string $number
     * @return string
     */
    public function describe(string $number) : string
    {
        if (isset($this->descriptions[$number])) {
            $this->nextStrategy();
        }

        $description = $this->strategy->describe($number);

        if (!isset($this->descriptions[$number])) {
            $this->descriptions[$number] = $description;
        }

        return $description;
    }

    /**
     * Prepare the next describer strategy to run
     *
     * Should be executed when the current strategy has encountered a number description
     * that has already occurred indicating that there is a circular pattern
     *
     * Throw exception after all description strategies have been exhausted
     *
     * @return void
     * @throws \RuntimeException
     */
    private function nextStrategy()
    {
        $strategy = next($this->strategies);

        if (!$strategy) {
            throw new \RuntimeException('Circular description pattern detected. Aborting!');
        }

        $this->strategy = new $strategy();
        $this->descriptions = [];
    }
}
