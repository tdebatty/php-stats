<?php

namespace webd\stats;

class Erf
{
    
    /**
     * Error function (also called the Gauss error function)
     * Value is computed using 
     * "Numerical Recipes in Fortran 77: The Art of Scientific Computing"
     * (ISBN 0-521-43064-X), 1992, page 214, Cambridge University Press.
     * Maximum error is 1.2 * 10^-7
     * 
     * https://en.wikipedia.org/wiki/Error_function
     * 
     * @param float $x
     * @return float
     */
    public static function erf($x) {
        $t =1 / (1 + 0.5 * abs($x));
        $tau = $t * exp(
                - $x * $x
                - 1.26551223
                + 1.00002368 * $t
                + 0.37409196 * $t * $t
                + 0.09678418 * $t * $t * $t
                - 0.18628806 * $t * $t * $t * $t
                + 0.27886807 * $t * $t * $t * $t * $t
                - 1.13520398 * $t * $t * $t * $t * $t * $t
                + 1.48851587 * $t * $t * $t * $t * $t * $t * $t
                - 0.82215223 * $t * $t * $t * $t * $t * $t * $t * $t
                + 0.17087277 * $t * $t * $t * $t * $t * $t * $t * $t * $t);
        if ($x >= 0) {
            return 1 - $tau;
        } else {
            return $tau - 1;
        }
    }
}
?>
