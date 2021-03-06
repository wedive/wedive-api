<?php
namespace Application;

use Application\DiveLog\AttachUserIdBeforeValidation as DiveLogAttachUserIdBeforeValidation;
use Application\Place\AttachUserIdBeforeValidation as PlaceAttachUserIdBeforeValidation;
use Application\DiveLog\DiverBeforAuth;
use Application\Place\Listener\OnlyActivePlaceListener;
use Strapieno\Auth\Api\Authorization\AuthorizationListenerAggregate;
use Strapieno\Utils\Listener\BeforeValidateListener;
use Strapieno\Utils\Listener\CorsListener;
use Zend\EventManager\EventManagerInterface;
use Zend\I18n\Translator\Translator;
use Zend\InputFilter\InputFilterPluginManager;
use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface;
use Zend\Mvc\MvcEvent;
use Zend\Stdlib\ArrayUtils;
use Zend\Console\Adapter\AdapterInterface;
use ZF\ContentValidation\ContentValidationListener;

class Module implements ConsoleUsageProviderInterface
{
    public function getConfig()
    {
        $config = include __DIR__ . '/config/module.config.php';

        $dir = __DIR__ . '/config/api';
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if (strpos($file, 'config') !== false) {
                        $config = ArrayUtils::merge($config, include $dir . '/' . $file);
                    }
                }
                closedir($dh);
            }
        }
        return $config;
    }

    public function onBootstrap(MvcEvent $e)
    {
        $events = $e->getApplication()->getEventManager();
        // TODO Move to config
        $events->attach(new CorsListener());
        $events->attach(new DiveLogAttachUserIdBeforeValidation());
        $events->attach(new PlaceAttachUserIdBeforeValidation());
        $events->attach(new OnlyActivePlaceListener());
    }

    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/',
                ],
            ],
        ];
    }

    public function getConsoleUsage(AdapterInterface $console)
    {
        return [
            // Describe available commands
            'test --path=<path> [--verbose|-v]' => 'Add oauth client entity',
            // Describe expected parameters
            [ '--path', 'Name of the client id'],
            [ '--verbose|-v', '(optional) turn on verbose mode']
        ];
    }
}
