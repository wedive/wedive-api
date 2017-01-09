<?php
namespace Application\Place\Hydrator;

use Application\Place\Object\Media;
use Matryoshka\Model\Hydrator\Strategy\HasManyStrategy;
use Matryoshka\Model\Hydrator\Strategy\HasOneStrategy;
use Strapieno\Place\Api\V1\Hydrator\PlaceHydrator as BasePlaceHydrator;
use Strapieno\PlaceGallery\Model\Entity\Reference\GalleryReference;
use Strapieno\User\Model\Entity\Reference\UserReference;
use Strapieno\User\Model\Entity\State\UserStateStrategy;
use Strapieno\Utils\Hydrator\Strategy\NamingStrategy\MapUnderscoreNamingStrategy;
use Strapieno\Utils\Hydrator\Strategy\ReferenceEntityCompressStrategy;
use Strapieno\Utils\Hydrator\Strategy\StateStrategy;
use Strapieno\Utils\Model\Object\Collection;
use Strapieno\Utils\Model\Object\MediaReference\MediaReference;
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

        $this->setNamingStrategy(
            new MapUnderscoreNamingStrategy([
                'user_reference' => 'user_id'
            ])
        );

        $media = new MediaReference();
        $media->getHydrator()->setNamingStrategy(
            new MapUnderscoreNamingStrategy(['gallery_id' => 'galleryReference'])
        );

        $media->getHydrator()->filterComposite->addFilter(
            'refIdentity',
            new MethodMatchFilter('getRefIdentity', true),
            FilterComposite::CONDITION_AND
        );

        $media->getHydrator()->addStrategy(
            'entity_reference',
            new ReferenceEntityCompressStrategy(new GalleryReference(), false)
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

        $this->addStrategy(
            'user_id',
            new ReferenceEntityCompressStrategy(new UserReference(), true)
        );
    }
}