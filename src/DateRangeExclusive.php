<?php

namespace IntervalTree;

use DateTime;
use DateInterval;

class DateRangeExclusive implements RangeInterface, \Iterator {

    protected $start, $end, $step;

    /**
     * Iterator state.
     */
    protected $iterPos = 0;
    protected $iterVal;

    public function __construct(DateTime $start, DateTime $end = null,
    DateInterval $step = null) {
        $this->start = clone $start;
        $this->end = clone $end;
        $this->step = $step ? : new DateInterval('P1D');

        $this->iterVal = clone $start;
    }

    public function iterable() {
        return $this;
    }

    public function getStart() {
        return $this->start;
    }

    public function getEnd() {
        return $this->end;
    }

    public function __toString() {
        return $this->start->format('Y-m-d') . ' .. ' . $this->end->format('Y-m-d');
    }

    /**
     * Iterator below.
     */
    public function current() {
        return clone $this->iterVal;
    }

    public function key() {
        return $this->iterPos;
    }

    public function next() {
        $this->iterPos++;
        $this->iterVal->add($this->step);
    }

    public function rewind() {
        if ($this->iterPos) {
            throw new \Exception('Iterator is forward-only');
        }
    }

    public function valid() {
        return ($this->iterVal < $this->getEnd());
    }

}
