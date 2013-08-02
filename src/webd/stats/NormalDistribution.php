<?php

namespace webd\stats;

class NormalDistribution
{
    private $_mean;
    private $_standardDeviation;
    
    public function __construct($mean = 0, $sd = 1) {
        $this->_mean = $mean;
        $this->_standardDeviation = $sd;
    }
    
    public function getMean() {
        return $this->_mean;
    }
    
    public function getStandardDeviation() {
        return $this->_standardDeviation;
    }
    
    public function getVariance() {
        return $this->_standardDeviation * $this->_standardDeviation;
    }
    
    /**
     * For a random variable X whose values are distributed according to a 
     * normal distribution, this method returns P(X <= x). In other words, 
     * this method represents the cumulative distribution function (CDF) for 
     * this distribution.
     * @param float $x
     */
    public function cumulativeProbability($x) {
        $dev = $x - $this->_mean;
        //if (abs($dev) > 40 * $this->_standardDeviation) {
        //    return $dev < 0 ? 0.0 : 1.0;
        //}
        return 0.5 * (1 + Erf::erf($dev / ($this->_standardDeviation * sqrt(2))));
    }
    
    
    /**
     * Generate a random value sampled from this distribution
     * @return float A random value folowing this normal distribution
     */
    public function sample() {

        return $this->_standardDeviation * Random::gaussian() + $this->_mean;
    }

    /**
     * 
     * @param type $count
     * @return float[]
     */
    public function samples($count) {
        $return = array();
        for ($i = 0; $i < $count; $i++) {
            $return[] = $this->sample();
        }
        return $return;
    }
}
?>
