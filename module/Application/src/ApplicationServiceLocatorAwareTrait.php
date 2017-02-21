<?php
namespace Application;

use Zend\ServiceManager\AbstractPluginManager;

trait ApplicationServiceLocatorAwareTrait
{
    public function getServiceLocator()
    {
        if ($this->serviceLocator instanceof AbstractPluginManager) {
            $this->serviceLocator = $this->serviceLocator->getServiceLocator();
        }
        return $this->serviceLocator;
    }
}