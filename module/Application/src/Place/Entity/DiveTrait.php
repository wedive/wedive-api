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
     * @var int
     */
    protected $current;

    /**
     * @var array
     */
    protected $badges;

    /**
     * @var array
     */
    protected $diveType;

    /**
     * beach or sea
     *
     * @var string
     */
    protected $startPointDive;

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
     * @return int
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * @param int $current
     * @return $this
     */
    public function setCurrent($current)
    {
        $this->current = $current;
        return $this;
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

    /**
     * @return string
     */
    public function getStartPointDive()
    {
        return $this->startPointDive;
    }

    /**
     * @param string $startPointDive
     * @return $this
     */
    public function setStartPointDive($startPointDive)
    {
        $this->startPointDive = $startPointDive;
        return $this;
    }

    /**
     * @return array
     */
    public function getDiveType()
    {
        return $this->diveType;
    }

    /**
     * @param array $diveType
     * @return $this
     */
    public function setDiveType($diveType)
    {
        $this->diveType = $diveType;
        return $this;
    }
}