<?php

namespace IntervalTree;

use DateTime;
use DateInterval;

class NumericRangeExclusive implements RangeInterface, \Iterator {

    protected $start, $end, $step;

    /**
     * Iterator state.
     */
    protected $iterPos = 0;
    protected $iterVal;

    public function __construct($start, $end = null, $step = 1) {
        $this->start = $start;
        $this->end = $end;
        $this->step = $step;

        $this->iterPos = 0;
        $this->iterVal = $this->start;
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
        return $this->start . '..' . $this->end;
    }

    /**
     * Iterator below.
     */
    public function current() {
        return $this->iterVal;
    }

    public function key() {
        return $this->iterPos;
    }

    public function next() {
        $this->iterPos++;
        $this->iterVal += $this->step;
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
