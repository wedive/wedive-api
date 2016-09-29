<?php
namespace Application;

use ImgMan\Apigility\Model\ImgManConnectedResource as BaseImgManConnectedResource;

/**
 * Class ImgManConnectedResource
 */
class ImgManConnectedResource extends BaseImgManConnectedResource
{
    /**
     * @param mixed $data
     * @return ImageInterface
     */
    public function create($data)
    {
        $id = new \MongoId();
        return $this->update($id->__toString(), $data);
    }
}