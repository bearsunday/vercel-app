<?php

declare(strict_types=1);

namespace MyVendor\MyProject;

use BEAR\Package\Injector as PackageInjector;
use Ray\Di\AbstractModule;
use Ray\Di\InjectorInterface;
use Ray\PsrCacheModule\ApcuAdapter;

use function dirname;

/** @SuppressWarnings(PHPMD.StaticAccess) */
final class Injector
{
    /** @codeCoverageIgnore */
    private function __construct()
    {
    }

    public static function getInstance(string $context): InjectorInterface
    {
        if ($context !== 'vercel') {
            return PackageInjector::getInstance(__NAMESPACE__, $context, dirname(__DIR__));
        }

        return \BEAR\Package\Injector\PackageInjector::getInstance(new VercelMeta(), 'prod-app', new ApcuAdapter());
    }

    public static function getOverrideInstance(string $context, AbstractModule $overrideModule): InjectorInterface
    {
        return PackageInjector::getOverrideInstance(__NAMESPACE__, $context, dirname(__DIR__), $overrideModule);
    }
}
