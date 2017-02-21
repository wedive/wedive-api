<?php
namespace Application\DiveLog\Criteria\Mongo;

use Matryoshka\Model\Wrapper\Mongo\Criteria\FindAllCriteria;
use Strapieno\DiveLog\Model\Criteria\Mongo\DiveLogMongoCollectionCriteria as BaseDiveLogMongoCollectionCriteria;

/**
 * Class DiveLogMongoCollectionCriteria
 */
class DiveLogMongoCollectionCriteria extends BaseDiveLogMongoCollectionCriteria
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