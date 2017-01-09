<?php
namespace Application\Place\Assertion;

use Matryoshka\Model\Wrapper\Mongo\Criteria\ActiveRecord\ActiveRecordCriteria;
use Strapieno\Auth\Api\Identity\IdentityInterface;
use Strapieno\Place\Model\PlaceModelAwareInterface;
use Strapieno\Place\Model\PlaceModelAwareTrait;
use Strapieno\User\Model\Entity\Reference\UserReferenceAwareInterface;
use Strapieno\User\Model\Entity\UserInterface;
use Zend\Mvc\Router\RouteMatch;
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Assertion\AssertionInterface;
use Zend\Permissions\Acl\Resource\ResourceInterface;
use Zend\Permissions\Acl\Role\RoleInterface;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

/**
 * Class IsOwnAssertion
 */
class IsOwnAssertion implements AssertionInterface, PlaceModelAwareInterface, ServiceLocatorAwareInterface
{
    use PlaceModelAwareTrait;
    use ServiceLocatorAwareTrait;

    protected $place;

    public function assert(Acl $acl, RoleInterface $role = null, ResourceInterface $resource = null, $privilege = null)
    {
        if ($role instanceof IdentityInterface) {
            $object = $role->getAuthenticationObject();

            $mvcEvent   = $this->getServiceLocator()->get('Application')->getMvcEvent();
            /** @var $routeMatch RouteMatch */
            $routeMatch = $mvcEvent->getRouteMatch();
            $placeId = $routeMatch->getParam('place_id');

            $criteria = new ActiveRecordCriteria();
            $criteria->setId($placeId);
            $this->place = $this->getPlaceModelService()->find($criteria)->current();

            if ($object instanceof UserInterface
                && $this->place instanceof UserReferenceAwareInterface
                && $userReference = $this->place->getUserReference()
            ) {
                $userId = $userReference->getId();
                if ($userId == $object->getId()) {
                    return true;
                }
            }
        }
        return false;
    }

    public function getServiceLocator()
    {
        if ($this->serviceLocator instanceof AbstractPluginManager) {
            $this->serviceLocator = $this->serviceLocator->getServiceLocator();
        }
        return $this->serviceLocator;
    }
}