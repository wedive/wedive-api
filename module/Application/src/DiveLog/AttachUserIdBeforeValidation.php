<?php
namespace Application\DiveLog;

use Strapieno\Auth\Api\Identity\IdentityInterface;
use Zend\Authentication\AuthenticationService;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;
use Zend\Mvc\MvcEvent;
use ZF\ContentNegotiation\ParameterDataContainer;
use ZF\ContentValidation\ContentValidationListener;

/**
 * Class DiverBeforAuth
 */
class AttachUserIdBeforeValidation implements ListenerAggregateInterface
{
    use ListenerAggregateTrait;

    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_ROUTE, [$this, 'attachUserId'], -649);
    }

    public function attachUserId(MvcEvent $e)
    {
        $serviceLocator = $e->getApplication()->getServiceManager();
        $config = $serviceLocator->get('Config');
        $controllerName = $e->getRouteMatch()->getParam('controller');



        if ($controllerName != 'Strapieno\DiveLog\Api\V1\Rest\Controller') {
            return;
        }

        $authService = $e->getApplication()->getServiceManager()->get('authentication');
        /** @var $dataContainer ParameterDataContainer */
        $dataContainer = $e->getParam('ZFContentNegotiationParameterData', false);
        $identity = $authService->getIdentity();

        $method = $e->getRequest()->getMethod();
        if ($method == 'GET') {
            if ($identity instanceof IdentityInterface && $identity->getRoleId() == 'diver') {
                /** @var $dataContainer ParameterDataContainer */
                $controllerName = $serviceLocator->get('ControllerLoader')->get('Strapieno\DiveLog\Api\V1\Rest\Controller');
                $e->getRequest()->getQuery()->set('user_id', $identity->getAuthenticationObject()->getId());
            }
        }

        if ($method == 'POST' || $method == 'PUT' || $method == 'PATCH') {

            if ($identity instanceof IdentityInterface && $identity->getRoleId() == 'diver') {
                /** @var $dataContainer ParameterDataContainer */
                $dataContainer = $e->getParam('ZFContentNegotiationParameterData', false);
                $dataContainer->setBodyParam('user_id', $identity->getAuthenticationObject()->getId());

            }
        }
    }
}