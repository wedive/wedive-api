<?php
namespace Application\Place\Entity;

/**
 * Interface DiveInterface
 */
interface DiveInterface
{
    /**
     * @return int
     */
    public function getMaxDepth();

    /**
     * @param int $maxDepth
     */
    public function setMaxDepth($maxDepth);

    /**
     * @return int
     */
    public function getMinDepth();

    /**
     * @param int $minDepth
     */
    public function setMinDepth($minDepth);

    /**
     * @return int
     */
    public function getVisibility();

    /**
     * @param int $visibility
     */
    public function setVisibility($visibility);

    /**
     * @return array
     */
    public function getBadges();

    /**
     * @param array $badges
     */
    public function setBadges($badges);
}