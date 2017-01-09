<?php
namespace Application\Place\Criteria\Mongo;

use Matryoshka\Model\Wrapper\Mongo\Criteria\FindAllCriteria;
use Strapieno\DiveLog\Model\Criteria\Mongo\DiveLogMongoCollectionCriteria as BaseDiveLogMongoCollectionCriteria;

/**
 * Class DiveLogMongoCollectionCriteria
 */
class PlaceMongoCollectionCriteria extends BaseDiveLogMongoCollectionCriteria
{
    /***
     * @param $userName
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->selectionCriteria['user_reference'] = (string) $userId;
        return $this;
    }
}