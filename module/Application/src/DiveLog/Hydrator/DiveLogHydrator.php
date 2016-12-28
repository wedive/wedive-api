<?php
namespace Application\DiveLog\Hydrator;

use Application\Place\Object\Media;
use Matryoshka\Model\Hydrator\Strategy\HasManyStrategy;
use Matryoshka\Model\Hydrator\Strategy\HasOneStrategy;
use Strapieno\DiveLog\Api\V1\Hydrator\DiveLogHydrator as BaseDiveLogHydrator;
use Strapieno\PlaceGallery\Model\Entity\Reference\GalleryReference;
use Strapieno\User\Model\Entity\Reference\UserReference;
use Strapieno\Utils\Hydrator\Strategy\NamingStrategy\MapUnderscoreNamingStrategy;
use Strapieno\Utils\Hydrator\Strategy\ReferenceEntityCompressStrategy;
use Strapieno\Utils\Model\Object\Collection;
use Strapieno\Utils\Model\Object\MediaReference\MediaReference;
use Zend\Hydrator\Filter\FilterComposite;
use Zend\Stdlib\Hydrator\Filter\MethodMatchFilter;

/**
 * Class DiveLogHydrator
 */
class DiveLogHydrator extends BaseDiveLogHydrator
{
    public function __construct($underscoreSeparatedKeys = true)
    {
        parent::__construct($underscoreSeparatedKeys);

        $this->setNamingStrategy(
            new MapUnderscoreNamingStrategy([
                'user_reference' => 'user_id'
            ])
        );

        $this->addStrategy(
            'user_id',
            new ReferenceEntityCompressStrategy(new UserReference(), true)
        );
    }
}