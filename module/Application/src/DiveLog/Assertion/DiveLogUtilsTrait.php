<?php
namespace Application\DiveLog\Assertion;

use Matryoshka\Model\Wrapper\Mongo\Criteria\ActiveRecord\ActiveRecordCriteria;

/**
 * Class DiveLogUtilsTrait
 */
trait DiveLogUtilsTrait
{
    public function getDiveLog()
    {
        $mvcEvent   = $this->getServiceLocator()->get('Application')->getMvcEvent();
        /** @var $routeMatch RouteMatch */
        $routeMatch = $mvcEvent->getRouteMatch();
        $placeId = $routeMatch->getParam('dive-log_id');

        $criteria = new ActiveRecordCriteria();
        $criteria->setId($placeId);
        return $this->getDiveLogModelService()->find($criteria)->current();
    }
}