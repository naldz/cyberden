<?php

namespace CyberdenBundle\Service\Utility;

class TimeLapseCalculator
{
    public function calculate(\DateTime $dateFrom, \DateTime $dateTo, $twoDigits = false)
    {
        $interval = $dateTo->diff($dateFrom);

        $totalHours = ($interval->d * 24) + $interval->h;
        $totalMinutes = $interval->i;

        if ($twoDigits && $totalHours < 10) {
            $totalHours = '0'.$totalHours;
        }

        if ($twoDigits && $totalMinutes < 10) {
            $totalMinutes = '0'.$totalMinutes;
        }

        return array(
            'hours' => $totalHours,
            'minutes' => $totalMinutes
        );
    }
}