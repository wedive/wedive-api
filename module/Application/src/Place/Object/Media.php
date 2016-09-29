<?php
namespace Application\Place\Object;

use Matryoshka\Model\Object\AbstractObject;
use Strapieno\PlaceGallery\Model\Entity\Reference\GalleryReferenceAwareInterface;
use Strapieno\PlaceGallery\Model\Entity\Reference\GalleryReferenceAwareTrait;
use Strapieno\Utils\Model\Object\Media\MediaInterface;
use Strapieno\Utils\Model\Object\Media\MediaTrait;
use Strapieno\Utils\Model\Object\RefIdentityInterface;

/**
 * Class Media
 */
class Media extends AbstractObject implements RefIdentityInterface, MediaInterface, GalleryReferenceAwareInterface
{
    use MediaTrait;
    use GalleryReferenceAwareTrait;

    /**
     * @return null|String
     */
    public function getRefIdentity()
    {
        return $this->getGalleryReference()->getId();
    }
}