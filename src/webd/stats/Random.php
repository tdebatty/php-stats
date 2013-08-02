<?php

namespace webd\stats;

class Random
{
    /**
     * Returns a random value following a gaussian law
     * Uses Polar version of Box_muller transform
     * https://en.wikipedia.org/wiki/Box%E2%80%93Muller_transform
     * http://www.taygeta.com/random/gaussian.html
     * @return float a random value following a gaussian law (mean 0 and stddev 1)
     */
    public static function gaussian() {
        do {
            $x1 = 2.0 * self::uniform() - 1.0;
            $x2 = 2.0 * self::uniform() - 1.0;
            $w = $x1 * $x1 + $x2 * $x2;
        } while ($w >= 1.0);

        $w = sqrt((-2.0 * log($w) ) / $w);
        $y1 = $x1 * $w;
        return $y1;
    }
    
    /**
     * Returns a uniformly distributed random value between 0 and 1
     * Uses Mersenne Twister algorithm
     * http://www.math.sci.hiroshima-u.ac.jp/~m-mat/MT/emt.html
     * And uses mt_rand()
     * http://php.net/manual/en/function.mt-rand.php
     * 
     * @return float
     */
    public static function uniform() {
        // The distribution of mt_rand() return values is biased towards even 
        // numbers on 64-bit builds of PHP when max is beyond 2^32.
        // See http://php.net/manual/en/function.mt-rand.php
        
        return mt_rand(0, pow(2, 32)) / pow(2, 32);
    }
}
?>
