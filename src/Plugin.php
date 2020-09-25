<?php

declare(strict_types=1);

namespace Chinstrap\Plugins\DynamicSitemap;

use Chinstrap\Core\Contracts\Plugin as PluginContract;
use Chinstrap\Core\Events\RegisterStaticRoutes;
use Chinstrap\Plugins\DynamicSitemap\Listeners\RegisterSitemapRoute;
use League\Event\EmitterInterface;

final class Plugin implements PluginContract
{
    /**
     * @var EmitterInterface
     */
    private $emitter;

    /**
     * @var RegisterSitemapRoute
     */
    private $listener;

    public function __construct(EmitterInterface $emitter, RegisterSitemapRoute $listener)
    {
        $this->emitter = $emitter;
        $this->listener = $listener;
    }

    public function register(): void
    {
        $this->emitter->addListener(
            RegisterStaticRoutes::class,
            $this->listener
        );
    }
}
