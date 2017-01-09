<?php
namespace Application\Place\Assertion;

use Matryoshka\Model\Wrapper\Mongo\Criteria\ActiveRecord\ActiveRecordCriteria;
use Strapieno\Auth\Api\Identity\IdentityInterface;
use Strapieno\Place\Model\PlaceModelAwareInterface;
use Strapieno\Place\Model\PlaceModelAwareTrait;
use Strapieno\User\Model\Entity\Reference\UserReferenceAwareInterface;
use Strapieno\User\Model\Entity\UserInterface;
use Strapieno\Utils\Model\Object\State\StateAwareInterface;
use Strapieno\Utils\Model\Object\State\StateInterface;
use Zend\Mvc\Router\RouteMatch;
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Assertion\AssertionInterface;
use Zend\Permissions\Acl\Resource\ResourceInterface;
use Zend\Permissions\Acl\Role\RoleInterface;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

/**
 * Class StateAssertion
 */
class StateAssertion extends IsOwnAssertion
{
    protected $state = 'validating';

    public function assert(Acl $acl, RoleInterface $role = null, ResourceInterface $resource = null, $privilege = null)
    {
        $result =  parent::assert($acl, $role, $resource, $privilege);

        if ($result && $this->place instanceof StateAwareInterface) {
            $state = $this->place->getState();
            if ($state->getName() == $this->state) {
                $result = true;
            } else {
                $result = false;
            }
        }
        return $result;
    }
}