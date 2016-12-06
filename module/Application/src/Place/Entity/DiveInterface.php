<?php
namespace Application\Place\Entity;

use Strapieno\Utils\Model\Object\Collection;

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
     * @return int
     */
    public function getCurrent();

    /**
     * @param int $current
     * @return $this
     */
    public function setCurrent($current);
    /**
     * @return array
     */
    public function getBadges();

    /**
     * @param array $badges
     */
    public function setBadges($badges);
}