<?php

namespace CyberdenBundle\Service\TwigExtension;

use CyberdenBundle\Service\Utility\RentalCostCalculator;

class RentalCost extends \Twig_Extension
{
    private $rentalCostCalculator;

    public function __construct(RentalCostCalculator $rentalCostCalculator)
    {
        $this->rentalCostCalculator = $rentalCostCalculator;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('rental_cost', array($this, 'calculateCost')),
        );
    }

    public function calculateCost(\DateTime $dateFrom, \DateTime $dateTo)
    {
        return $this->rentalCostCalculator->calculate($dateFrom, $dateTo);
    }

    public function getName()
    {
        return 'cost_extension';
    }

}
