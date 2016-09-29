<?php
namespace Application\Place\Entity;

/**
 * Class DiveTrait
 */
trait DiveTrait
{
    /**
     * @var int (meters)
     */
    protected $maxDepth;

    /**
     * @var int (meters)
     */
    protected $minDepth;

    /**
     * @var int
     */
    protected $visibility;

    /**
     * @var array
     */
    protected $badges;

    /**
     * @return int
     */
    public function getMaxDepth()
    {
        return $this->maxDepth;
    }

    /**
     * @param int $maxDepth
     */
    public function setMaxDepth($maxDepth)
    {
        $this->maxDepth = $maxDepth;
    }

    /**
     * @return int
     */
    public function getMinDepth()
    {
        return $this->minDepth;
    }

    /**
     * @param int $minDepth
     */
    public function setMinDepth($minDepth)
    {
        $this->minDepth = $minDepth;
    }

    /**
     * @return int
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @param int $visibility
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }

    /**
     * @return array
     */
    public function getBadges()
    {
        return $this->badges;
    }

    /**
     * @param array $badges
     */
    public function setBadges($badges)
    {
        $this->badges = $badges;
    }
}