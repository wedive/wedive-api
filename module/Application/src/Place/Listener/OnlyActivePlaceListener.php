<?php
namespace Application\Place\Listener;

use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;
use Zend\Mvc\MvcEvent;

/**
 * Class OnlyActivePlaceListener
 */
class OnlyActivePlaceListener implements ListenerAggregateInterface
{
    use ListenerAggregateTrait;

    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_ROUTE, [$this, 'attachStateActive'], -649);
    }

    public function attachStateActive(MvcEvent $e)
    {
        $serviceLocator = $e->getApplication()->getServiceManager();
        $config = $serviceLocator->get('Config');
        $controllerName = $e->getRouteMatch()->getParam('controller');

        if ($controllerName != 'Strapieno\Place\Api\V1\Rest\Controller') {
            return;
        }

        $authService = $e->getApplication()->getServiceManager()->get('authentication');
        /** @var $dataContainer ParameterDataContainer */
        $dataContainer = $e->getParam('ZFContentNegotiationParameterData', false);
        $identity = $authService->getIdentity();
        $method = $e->getRequest()->getMethod();

        if ($method == 'GET'
            && $identity->getRoleId() == 'guest'
        ) {
            /** @var $dataContainer ParameterDataContainer */
            $e->getRequest()->getQuery()->set('state', 'active');
        }
    }
}