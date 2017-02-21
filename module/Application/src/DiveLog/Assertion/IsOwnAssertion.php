<?php
namespace Application\DiveLog\Assertion;

use Application\ApplicationServiceLocatorAwareTrait;
use Matryoshka\Model\Wrapper\Mongo\Criteria\ActiveRecord\ActiveRecordCriteria;
use Strapieno\Auth\Api\Identity\IdentityInterface;
use Strapieno\DiveLog\Model\DiveLogModelAwareInterface;
use Strapieno\DiveLog\Model\DiveLogModelAwareTrait;
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
class IsOwnAssertion implements AssertionInterface, DiveLogModelAwareInterface, ServiceLocatorAwareInterface
{
    use DiveLogModelAwareTrait;
    use ServiceLocatorAwareTrait;
    use DiveLogUtilsTrait;
    use ApplicationServiceLocatorAwareTrait {
        ApplicationServiceLocatorAwareTrait::getServiceLocator insteadof ServiceLocatorAwareTrait;
    }

    protected $place;

    public function assert(Acl $acl, RoleInterface $role = null, ResourceInterface $resource = null, $privilege = null)
    {
        if ($role instanceof IdentityInterface) {
            $object = $role->getAuthenticationObject();

            $diveLog = $this->getDiveLog();

            if ($object instanceof UserInterface
                && $diveLog instanceof UserReferenceAwareInterface
            ) {
                if ($diveLog->getUserReference()->getId() == $object->getId()) {
                    return true;
                }
            }
        }
        return false;
    }
}