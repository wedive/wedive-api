<?php
namespace Application\DiveLog\Hydrator\Mongo;

use Strapieno\DiveLog\Model\Hydrator\Mongo\DiveLogModelMongoHydrator as BaseDiveLogModelMongoHydrator;
use Strapieno\User\Model\Entity\Reference\UserReference;
use Strapieno\Utils\Hydrator\Strategy\NamingStrategy\MapUnderscoreNamingStrategy;
use Strapieno\Utils\Hydrator\Strategy\ReferenceEntityCompressStrategy;

/**
 * Class DiveLogModelMongoHydrator
 */
class DiveLogModelMongoHydrator extends BaseDiveLogModelMongoHydrator
{
    public function __construct($underscoreSeparatedKeys = true)
    {
        parent::__construct($underscoreSeparatedKeys);

        $this->addStrategy(
            'user_reference',
            new ReferenceEntityCompressStrategy(new UserReference(), true)
        );
    }
}