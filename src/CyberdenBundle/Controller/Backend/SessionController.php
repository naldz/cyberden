<?php

namespace CyberdenBundle\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use CyberdenBundle\Model\Session;

class SessionController extends Controller
{
    public function newAction(Request $request)
    {
        $params = $request->request->all();
        $duration = $params['numberOfHours'];
        $minutesInHour = 60;
        $startTime = new \DateTime();

        //if duration is 0 or null, it means open time
        if (!$duration) {
            $endTime = null;
            $durationEndTime = clone $startTime;
            $durationEndTime = $durationEndTime->add(new \DateInterval('P1M')); //add 1 month by default (open time)
            $durationInMinutes = null;
        }
        else {
            $durationInMinutes = $minutesInHour * $duration;
            $endTime = clone $startTime;
            $endTime->add(new \DateInterval('PT'.$durationInMinutes.'M'));
            $durationEndTime = $endTime;
        }

        $session = new Session();
        $session->setStationId($params['stationId']);
        $session->setComment($params['comments']);
        $session->setAdministratorId($this->getUser()->getId());
        $session->setDuration($durationInMinutes);
        $session->setStartTime($startTime);
        $session->setEndTime($endTime);
        $session->setDurationEndTime($durationEndTime);

        $sessionRepository = $this->container->get('cyberden.model_repository.session');
        $sessionRepository->save($session);

        return new JsonResponse($session->toArray(TableMap::TYPE_CAMELNAME));
    }

    public function listAction(Request $request)
    {
        $status = $request->get('status', 'all');

        //get the time lapse calculator
        $timeLapseCalculator = $this->container->get('cyberden.utility.time_lapse_calculator');
        $rentalCostCalculator = $this->container->get('cyberden.utility.rental_cost_calculator');

        //get the current sessions
        $sessionRepo = $this->container->get('cyberden.model_repository.session');
        $sessionQuery = $sessionRepo->createQuery();

        if ('active' == $status) {
            $sessionQuery->filterByDurationEndTime(new \DateTime(), Criteria::GREATER_THAN);
        }

        $sessions = $sessionQuery->find();

        $currentDateTime = new \DateTime();
        $data = array();

        foreach ($sessions as $iSession) {

            $timeLapse = $timeLapseCalculator->calculate($iSession->getStartTime(), $currentDateTime, true);
            $rentalCost = $rentalCostCalculator->calculate($iSession->getStartTime(), $currentDateTime);
            $formattedRentalCost = number_format($rentalCost, 2, '.', ',');

            $data[] = array(
                'sessionId' => $iSession->getId(),
                'stationId' => $iSession->getStationId(),
                'duration'   => $iSession->getDuration(),
                'timeStarted' => $iSession->getStartTime()->format('Y-m-d H:i:s'),
                'endTime'  => $iSession->getEndTime(),
                'totalCost' => $iSession->getCost(),
                'currentUsage' => array(
                    'currentCost' => $formattedRentalCost,
                    'timeLapse' => sprintf('%s:%s', $timeLapse['hours'], $timeLapse['minutes'])
                )
            );
        }

        return new JsonResponse($data);
    }
}