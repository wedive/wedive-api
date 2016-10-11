<?php
namespace Application\User\Entity;

use Strapieno\User\Model\Entity\UserEntity as BaseUserEntity;
use Strapieno\UserAvatar\Model\Entity\AvatarAwareInterface;
use Strapieno\UserAvatar\Model\Entity\AvatarAwareTrait;
use Strapieno\UserAvatar\Model\Entity\UserAvatarAwareInterface;
use Strapieno\UserAvatar\Model\Entity\UserAvatarAwareTrait;

/**
 * Class UserEntity
 */
class UserEntity extends BaseUserEntity implements AvatarAwareInterface
{
    use AvatarAwareTrait;

    /**
     * @var string
     */
    protected $type;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}