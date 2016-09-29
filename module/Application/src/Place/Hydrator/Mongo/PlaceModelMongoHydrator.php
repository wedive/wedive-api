<?php
namespace Application\Place\Hydrator\Mongo;

use Application\Place\Object\Media;
use Matryoshka\Model\Hydrator\Strategy\HasManyStrategy;
use Matryoshka\Model\Hydrator\Strategy\HasOneStrategy;
use Strapieno\Place\Model\Hydrator\Mongo\PlaceModelMongoHydrator as BasePlaceModelMongoHydrator;
use Strapieno\PlaceGallery\Model\Entity\Reference\GalleryReference;
use Strapieno\Utils\Model\Object\Collection;
use Zend\Hydrator\Filter\FilterComposite;
use Zend\Stdlib\Hydrator\Filter\MethodMatchFilter;

/**
 * Class PlaceModelMongoHydrator
 */
class PlaceModelMongoHydrator extends BasePlaceModelMongoHydrator
{

    public function __construct($underscoreSeparatedKeys = true)
    {
        parent::__construct($underscoreSeparatedKeys);

        $media = new Media();
        $media->getHydrator()->filterComposite->addFilter(
            'refIdentity',
            new MethodMatchFilter('getRefIdentity', true),
            FilterComposite::CONDITION_AND
        );

        $media->getHydrator()->addStrategy(
            'gallery_reference',
            new HasOneStrategy(new GalleryReference(), false)
        );

        $this->addStrategy(
            'media',
            new HasManyStrategy(
                $media,
                new Collection(),
                false
            )
        );
    }
}