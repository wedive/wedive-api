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
class StateAssertion  implements AssertionInterface, PlaceModelAwareInterface, ServiceLocatorAwareInterface
{
    use PlaceModelAwareTrait;
    use ServiceLocatorAwareTrait;
    use PlaceUtilsTrait {
        PlaceUtilsTrait::getServiceLocator insteadof ServiceLocatorAwareTrait;
    }
    /**
     * @var string
     */
    protected $state;

    /**
     * StateAssertion constructor.
     * @param string $state
     */
    public function __construct($option = null)
    {
        if (is_array($option) && isset($option['state'])) {
            $this->setState($option['state']);
        } else {
        //    throw new \InvalidArgumentException('Missing argument state');
        }
    }


    public function assert(Acl $acl, RoleInterface $role = null, ResourceInterface $resource = null, $privilege = null)
    {
        $place = $this->getPlace();
        if ($place instanceof StateAwareInterface) {

            if ($place->getState()->getName() == $this->state) {
                $result = true;
            } else {
                $result = false;
            }
        }
        return $result;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }
}