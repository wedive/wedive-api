<?php
namespace Application\Place\Hydrator\Mongo\Strategy;

use Matryoshka\Model\Hydrator\Strategy\HasOneStrategy;
use Strapieno\Utils\Model\Object\GeoCoordinate\GeoCoordinateInterface;

/**
 * Class GeoStrategy
 */
class GeoStrategy extends HasOneStrategy
{
    public function extract($value)
    {
        $result = parent::extract($value);
        if ($value instanceof GeoCoordinateInterface && is_array($result)) {
            $result["type"] = "Point";
            $result["coordinates"] = [ (float) $value->getLongitude(), (float) $value->getLatitude()];
        }
        return $result;
    }
}