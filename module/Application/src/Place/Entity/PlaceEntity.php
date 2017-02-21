<?php
namespace Application\Place\Entity;

use Strapieno\Place\Model\Entity\PlaceEntity as BasePlaceEntity;
use Strapieno\PlaceCover\Model\Entity\CoverAwareInterface;
use Strapieno\PlaceCover\Model\Entity\CoverAwareTrait;
use Strapieno\Utils\Model\Object\Collection;
use Strapieno\Utils\Model\Object\CollectionAwareInterface;
use Strapieno\Utils\Model\Object\CollectionAwareTrait;
use Strapieno\Utils\Model\Object\State\StateAwareInterface;
use Strapieno\Utils\Model\Object\State\StateAwareTrait;

/**
 * Class PlaceEntity
 */
class PlaceEntity extends BasePlaceEntity implements DiveInterface,
    CoverAwareInterface,
    CollectionAwareInterface,
    StateAwareInterface
{
    use DiveTrait;
    use CoverAwareTrait;
    use CollectionAwareTrait;
    use StateAwareTrait;

    /**
     * @return Collection|\Strapieno\Utils\Model\Object\CollectionInterface
     */
    public function getCollection()
    {
        if (!$this->collection) {
            $this->collection = new Collection();
        }
        return $this->collection;
    }
}