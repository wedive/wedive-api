<?php
namespace Application\OAuth\Adapter;

use MongoDate;
use Strapieno\Auth\Model\OAuth2\AdapterInterface;
use ZF\ApiProblem\Exception\DomainException;
use Strapieno\Auth\Model\OAuth2\Adapter\MongoAdapter as BaseMongoAdapter;

/**
 * Class MongoAdapter
 */
class MongoAdapter extends BaseMongoAdapter implements AdapterInterface
{

    /**
     * @param $username
     * @return array|bool|null
     */
    public function getUser($username)
    {
        $cursor = $this->collection('user_table')->find([$this->identityField => $username]);

        if ($cursor->count() > 1) {
            $exception = new DomainException('Failure due to identity being ambiguous', 401);
            $exception->setType('http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html');
            $exception->setTitle('invalid_grant');
            throw $exception;
        }

        $result = null;

        foreach ($cursor as $result) {
            if ($result && isset($result['state']) && $result['state'] == 'registered') {
                $exception = new DomainException('User email has been not validated', 401);
                $exception->setType('http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html');
                $exception->setTitle('invalid_user_status');
                throw $exception;
            }
        }

        return is_null($result) ? false : $result;
    }
}