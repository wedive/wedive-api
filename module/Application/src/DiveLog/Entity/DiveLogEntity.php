<?php
namespace Application\DiveLog\Entity;

use \Strapieno\DiveLog\Model\Entity\DiveLogEntity as BaseDiveLog;
use Strapieno\User\Model\Entity\Reference\UserReferenceAwareInterface;
use Strapieno\User\Model\Entity\Reference\UserReferenceAwareTrait;

/**
 * Class DiveLogEntity
 */
class DiveLogEntity extends BaseDiveLog implements UserReferenceAwareInterface
{

    use UserReferenceAwareTrait;

    /**
     * @var string
     */
    protected $placeReference;

    /**
     * @return string
     */
    public function getPlaceReference()
    {
        return $this->placeReference;
    }

    /**
     * @param string $placeReference
     * @return $this
     */
    public function setPlaceReference($placeReference)
    {
        $this->placeReference = $placeReference;
        return $this;
    }
}