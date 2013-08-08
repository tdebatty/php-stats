<?php

namespace webd\stats;

class Stats
{
    /**
     * Compute the Bayesian information criterion (BIC) or Schwarz criterion
     * http://en.wikipedia.org/wiki/Bayesian_information_criterion
     * 
     * @param float $LLF Value of the optimized log-likelihood objective function (LLF) for estimated model parameters
     * @param int $NumParams Number of estimated parameters associated
     * @param float $NumObs  Number of data points, number of observations, or the sample size
     * @return float
     */
    public static function bic($LLF, $NumParams, $NumObs) {
        return -2 * $LLF + $NumParams * log($NumObs);
    }
            
}
?>
