<?php

namespace CyberdenBundle\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CyberdenBundle\Model\StationQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Symfony\Component\HttpFoundation\JsonResponse;
use Propel\Runtime\Map\TableMap;

class StationController extends Controller
{
    public function monitorAction(Request $request)
    {
        //get all the stations
        $stationRepo = $this->container->get('cyberden.model_repository.station');
        $stations = $stationRepo->createQuery()
            ->filterByIsCommissioned(StationQuery::IS_COMMISSIONED_TRUE)
            ->orderByName()
            ->find();

        $stationData = array();
        foreach ($stations as $iStation) {
            $stationData[$iStation->getId()] = $iStation->toArray(TableMap::TYPE_CAMELNAME);
        }


        //get the current sessions
        $sessionRepo = $this->container->get('cyberden.model_repository.session');
        $sessions = $sessionRepo->createQuery()
            ->filterByDurationEndTime(new \DateTime(), Criteria::GREATER_THAN)
            ->find();

        $mappedSessions = array();
        foreach ($sessions as $iSession) {
            $mappedSessions[$iSession->getStationId()] = $iSession->toArray(TableMap::TYPE_CAMELNAME);
        }

        return $this->render('CyberdenBundle::control_station.html.twig', array(
            'data' => json_encode(array(
                'stations' => $stationData,
                'sessions' => $mappedSessions,
                'stationListNodeId' => 'station-list'
            )),
            // 'sessions' => $mappedSessions
        ));
    }

    public function monitorDataAction(Request $request)
    {
        /***
        $data = array(
            '1' => array(
                'session_id'    => '123',
                'duration'      => '2',
                'time_started'  => '2016-12-06 02:30',
                'end_time'      => '2016-12-06 04:30',
                'total_cost'    => 'Open Time',
                'current_usage' => array(
                    'current_cost' => '10.50',
                    'time_lapse' => '01:10'
                )
            ),
        );
        ***/

        //get the time lapse calculator
        $timeLapseCalculator = $this->container->get('cyberden.utility.time_lapse_calculator');
        $rentalCostCalculator = $this->container->get('cyberden.utility.rental_cost_calculator');

        //get the current sessions
        $sessionRepo = $this->container->get('cyberden.model_repository.session');
        $sessions = $sessionRepo->createQuery()
            ->filterByDurationEndTime(new \DateTime(), Criteria::GREATER_THAN)
            ->find();

        $currentDateTime = new \DateTime();
        $data = array();

        foreach ($sessions as $iSession) {

            $timeLapse = $timeLapseCalculator->calculate($iSession->getStartTime(), $currentDateTime, true);
            $rentalCost = $rentalCostCalculator->calculate($iSession->getStartTime(), $currentDateTime);
            $formattedRentalCost = number_format($rentalCost, 2, '.', ',');

            $data[$iSession->getStationId()] = array(
                'session_id' => $iSession->getId(),
                'duration'   => $iSession->getDuration(). '',
                'time_started' => $iSession->getStartTime(),
                'end_time'  => $iSession->getEndTime(),
                'total_cost' => $iSession->getCost(),
                'current_usage' => array(
                    'current_cost' => $formattedRentalCost,
                    'time_lapse' => sprintf('%s:%s', $timeLapse['hours'], $timeLapse['minutes'])
                )
            );
        }

        return new JsonResponse($data);
    }
}