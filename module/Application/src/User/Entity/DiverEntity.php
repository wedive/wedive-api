<?php
namespace Application\User\Entity;

use Strapieno\User\Model\Entity\UserEntity as BaseUserEntity;
use Strapieno\UserAvatar\Model\Entity\AvatarAwareInterface;
use Strapieno\UserAvatar\Model\Entity\AvatarAwareTrait;
use Strapieno\UserAvatar\Model\Entity\UserAvatarAwareInterface;
use Strapieno\UserAvatar\Model\Entity\UserAvatarAwareTrait;
use Strapieno\Utils\Model\Entity\RercoverPasswordAwareInterface;
use Zend\Math\Rand;

/**
 * Class DiverEntity
 */
class DiverEntity extends BaseUserEntity implements AvatarAwareInterface
{
    use AvatarAwareTrait;

    const LIST_CHARACTERS = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789-_';

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
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return $this
     */
    public function generateIdentityExistToken()
    {
        $this->identityExistToken = Rand::getString(
            RercoverPasswordAwareInterface::RECOVER_PASSWORD_TOKEN_LENGTH,
            DiverEntity::LIST_CHARACTERS
        );
        return $this;
    }

    public function generateRecoverPasswordToken()
    {
        $this->recoverPasswordToken = Rand::getString(
            RercoverPasswordAwareInterface::RECOVER_PASSWORD_TOKEN_LENGTH,
            DiverEntity::LIST_CHARACTERS
        );
        return $this;
    }
}