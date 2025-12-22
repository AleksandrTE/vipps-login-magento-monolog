<?php

declare(strict_types=1);

namespace Vipps\Login\Model\Config\Version;

use Vipps\Login\Model\Config\Config;
use Vipps\Login\Model\Config\Source\Version;
use Magento\Framework\App\ObjectManager;

class Pool
{
    private array $pool;
    private Config $config;

    public function __construct(
        ?array  $pool = null,
        Config $config = null
    ) {
        $this->pool = $pool ?? [];
        $this->config = $config ?? ObjectManager::getInstance()->get(Config::class);
    }

    public function get()
    {
        $versionCode = $this->config->getVersion();

        return $this->pool[$versionCode]
            ?? $this->pool[Version::CONFIG_VIPPS]
            ?? null;
    }
}
