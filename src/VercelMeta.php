<?php

declare(strict_types=1);

namespace MyVendor\MyProject;

use BEAR\AppMeta\AbstractAppMeta;

use function dirname;

/** @SuppressWarnings(PHPMD.StaticAccess) */
final class VercelMeta extends AbstractAppMeta
{
    public $name = __NAMESPACE__;
    public $tmpDir = '/tmp'; // Vercel用
    public $logDir = '/tmp'; // Vercel用
    public $appDir;

    public function __construct()
    {
        $this->appDir = dirname(__DIR__);
    }
}
