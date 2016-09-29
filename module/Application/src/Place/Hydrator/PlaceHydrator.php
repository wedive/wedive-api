<?php
namespace Application\Place\Hydrator;

use Application\Place\Object\Media;
use Matryoshka\Model\Hydrator\Strategy\HasManyStrategy;
use Matryoshka\Model\Hydrator\Strategy\HasOneStrategy;
use Strapieno\Place\Api\V1\Hydrator\PlaceHydrator as BasePlaceHydrator;
use Strapieno\PlaceGallery\Model\Entity\Reference\GalleryReference;
use Strapieno\Utils\Hydrator\Strategy\NamingStrategy\MapUnderscoreNamingStrategy;
use Strapieno\Utils\Hydrator\Strategy\ReferenceEntityCompressStrategy;
use Strapieno\Utils\Model\Object\Collection;
use Zend\Hydrator\Filter\FilterComposite;
use Zend\Stdlib\Hydrator\Filter\MethodMatchFilter;

/**
 * Class PlaceHydrator
 */
class PlaceHydrator extends BasePlaceHydrator
{
    public function __construct($underscoreSeparatedKeys = true)
    {
        parent::__construct($underscoreSeparatedKeys);



        $media = new Media();

        $media->getHydrator()->setNamingStrategy(
            new MapUnderscoreNamingStrategy(['gallery_id' => 'galleryReference'])
        );

        $media->getHydrator()->filterComposite->addFilter(
            'refIdentity',
            new MethodMatchFilter('getRefIdentity', true),
            FilterComposite::CONDITION_AND
        );

        $media->getHydrator()->addStrategy(
            'gallery_id',
            new ReferenceEntityCompressStrategy(new GalleryReference(), false)
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