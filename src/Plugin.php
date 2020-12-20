<?php

declare(strict_types=1);

namespace Chinstrap\Plugins\DynamicSitemap;

use Chinstrap\Core\Contracts\Plugin as PluginContract;
use Chinstrap\Core\Events\RegisterStaticRoutes;
use Chinstrap\Plugins\DynamicSitemap\Listeners\RegisterSitemapRoute;
use Laminas\EventManager\EventManagerInterface;

final class Plugin implements PluginContract
{
    /**
     * @var EventManagerInterface
     */
    private $manager;

    /**
     * @var RegisterSitemapRoute
     */
    private $listener;

    public function __construct(EventManagerInterface $manager, RegisterSitemapRoute $listener)
    {
        $this->manager = $manager;
        $this->listener = $listener;
    }

    public function register(): void
    {
        $this->manager->attach(
            RegisterStaticRoutes::class,
            $this->listener
        );
    }
}
