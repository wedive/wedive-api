<?php
namespace Application\Place\Entity;

use Strapieno\Place\Model\Entity\PlaceEntity as BasePlaceEntity;
use Strapieno\PlaceCover\Model\Entity\CoverAwareInterface;
use Strapieno\PlaceCover\Model\Entity\CoverAwareTrait;
use Strapieno\Utils\Model\Object\Collection;

/**
 * Class PlaceEntity
 */
class PlaceEntity extends BasePlaceEntity implements DiveInterface, CoverAwareInterface
{
    use DiveTrait;
    use CoverAwareTrait;

    /**
     * @var Collection
     */
    protected $media;

    /**
     * @return Collection
     */
    public function getMedia()
    {
        if (!$this->media) {
            $this->media = new Collection();
        }
        return $this->media;
    }

    /**
     * @param Collection $media
     */
    public function setMedia(Collection $media)
    {
        $this->media = $media;
    }
}