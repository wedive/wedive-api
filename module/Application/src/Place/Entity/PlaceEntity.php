<?php
namespace Application\Place\Entity;

use Strapieno\Place\Model\Entity\PlaceEntity as BasePlaceEntity;
use Strapieno\PlaceCover\Model\Entity\CoverAwareInterface;
use Strapieno\PlaceCover\Model\Entity\CoverAwareTrait;
use Strapieno\Utils\Model\Object\Collection;
use Strapieno\Utils\Model\Object\CollectionAwareInterface;
use Strapieno\Utils\Model\Object\CollectionAwareTrait;

/**
 * Class PlaceEntity
 */
class PlaceEntity extends BasePlaceEntity implements DiveInterface, CoverAwareInterface, CollectionAwareInterface
{
    use DiveTrait;
    use CoverAwareTrait;
    use CollectionAwareTrait;

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