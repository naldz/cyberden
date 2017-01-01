<?php

namespace CyberdenBundle\Service\Utility;

use CyberdenBundle\Service\ModelRepository\SettingRepository;

class RentalCostCalculator
{
    private $settingRepository;
    private $settings;
    private $minimumMinutes = 30;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
        $this->settings = $this->settingRepository->createQuery()->findOne();

        if (!$this->settings) {
            throw new \Exception('No settings configured!');
        }
    }

    public function calculate(\DateTime $dateFrom, \DateTime $dateTo)
    {
        $interval = $dateTo->diff($dateFrom);

        $totalHours = ($interval->d * 24) + $interval->h;
        $totalMinutes = $interval->i + ($totalHours * 60);

        if ($totalMinutes < $this->minimumMinutes) {
            $totalMinutes = $this->minimumMinutes;
        }

        $costPerMinute = $this->settings->getRentalPrice() / 60;

        return $totalMinutes * $costPerMinute;
    }

}