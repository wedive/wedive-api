<?php
namespace Application\Place\Assertion;

use Matryoshka\Model\Wrapper\Mongo\Criteria\ActiveRecord\ActiveRecordCriteria;
use Zend\ServiceManager\AbstractPluginManager;

/**
 * Class PlaceUtilsTrait
 */
trait PlaceUtilsTrait
{
    public function getPlace()
    {
        $mvcEvent   = $this->getServiceLocator()->get('Application')->getMvcEvent();
        /** @var $routeMatch RouteMatch */
        $routeMatch = $mvcEvent->getRouteMatch();
        $placeId = $routeMatch->getParam('place_id');

        $criteria = new ActiveRecordCriteria();
        $criteria->setId($placeId);
        return $this->getPlaceModelService()->find($criteria)->current();
    }
}