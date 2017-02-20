<?php
namespace Application\Place\Hydrator\Mongo;

use Application\Place\Hydrator\Mongo\Strategy\GeoStrategy;
use Matryoshka\Model\Hydrator\Strategy\HasManyStrategy;
use Matryoshka\Model\Hydrator\Strategy\HasOneStrategy;
use Matryoshka\Model\Hydrator\Strategy\SetTypeStrategy;
use Strapieno\Place\Model\Entity\Object\GeoCoordinateObject;
use Strapieno\Place\Model\Hydrator\Mongo\PlaceModelMongoHydrator as BasePlaceModelMongoHydrator;
use Strapieno\PlaceGallery\Model\Entity\Reference\GalleryReference;
use Strapieno\User\Model\Entity\Reference\UserReference;
use Strapieno\Utils\Hydrator\Strategy\ReferenceEntityCompressStrategy;
use Strapieno\Utils\Hydrator\Strategy\StateStrategy;
use Strapieno\Utils\Model\Object\Collection;
use Strapieno\Utils\Model\Object\MediaReference\MediaReference;
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

        $media = new MediaReference();

        $this->removeStrategy('geo_coordinate');
        $this->addStrategy(
            'geo_coordinate',
            new GeoStrategy(new GeoCoordinateObject(), false)
        );

        $media->getHydrator()->filterComposite->addFilter(
            'refIdentity',
            new MethodMatchFilter('getRefIdentity', true),
            FilterComposite::CONDITION_AND
        );

        $media->getHydrator()->addStrategy(
            'entity_reference',
            new HasOneStrategy(new GalleryReference(), false)
        );

        $this->addStrategy(
            'collection',
            new HasManyStrategy(
                $media,
                new Collection(),
                false
            )
        );
        $strategy = new StateStrategy();
        $strategy->setFirstStateName('validating');
        $this->addStrategy('state', $strategy);
        $this->addStrategy('current', new SetTypeStrategy('int', 'int'));
        $this->addStrategy('visibility', new SetTypeStrategy('int', 'int'));
        $this->addStrategy('max_depth', new SetTypeStrategy('int', 'int'));
        $this->addStrategy('min_depth', new SetTypeStrategy('int', 'int'));

        $this->addStrategy(
            'user_reference',
            new ReferenceEntityCompressStrategy(new UserReference(), true)
        );
    }
}