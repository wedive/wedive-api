<?php
namespace Application\User\Entity;

use Strapieno\User\Model\Entity\UserEntity as BaseUserEntity;
use Strapieno\UserAvatar\Model\Entity\AvatarAwareInterface;
use Strapieno\UserAvatar\Model\Entity\AvatarAwareTrait;
use Strapieno\UserAvatar\Model\Entity\UserAvatarAwareInterface;
use Strapieno\UserAvatar\Model\Entity\UserAvatarAwareTrait;

/**
 * Class DiverEntity
 */
class DiverEntity extends BaseUserEntity implements AvatarAwareInterface
{
    use AvatarAwareTrait;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $comment;

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

    /**
     * @return string
     */
    public function getRoleId()
    {
        if (!$this->roleId) {
            $this->roleId = 'diver';
        }
        return $this->roleId;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return $this
     */
    public function setComment(string $comment)
    {
        $this->comment = $comment;
        return $this;
    }
}