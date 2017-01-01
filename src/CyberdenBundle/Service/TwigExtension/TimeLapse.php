<?php

namespace CyberdenBundle\Service\TwigExtension;

use CyberdenBundle\Service\Utility\TimeLapseCalculator;

class TimeLapse extends \Twig_Extension
{
    private $timeLapseCalculator;

    public function __construct(TimeLapseCalculator $timeLapseCalculator)
    {
        $this->timeLapseCalculator = $timeLapseCalculator;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('time_lapse', array($this, 'calculateTimeLapse')),
        );
    }

    public function calculateTimeLapse(\DateTime $dateFrom, \DateTime $dateTo)
    {
        $timeLapse = $this->timeLapseCalculator->calculate($dateFrom, $dateTo, true);
        $totalHours = $timeLapse['hours'];
        $totalMinutes = $timeLapse['minutes'];

        return sprintf('%s:%s', $totalHours, $totalMinutes);
    }

    public function getName()
    {
        return 'time_lapse_extension';
    }

}
