<?php

declare(strict_types=1);

namespace Chinstrap\Plugins\DynamicSitemap\Tests;

use Chinstrap\Core\Events\RegisterStaticRoutes;
use Chinstrap\Plugins\DynamicSitemap\Listeners\RegisterSitemapRoute;
use Chinstrap\Plugins\DynamicSitemap\Plugin;
use Chinstrap\Plugins\DynamicSitemap\Tests\TestCase;
use Mockery as m;

final class PluginTest extends TestCase
{
    public function testSetup()
    {
        $router = m::mock('League\Route\Router');
        $listener = new RegisterSitemapRoute($router);
        $emitter = m::mock('Laminas\EventManager\EventManagerInterface');
        $emitter->shouldReceive('attach')
            ->with(RegisterStaticRoutes::class, $listener)
            ->once();
        $plugin = new Plugin($emitter, $listener);
        $plugin->register();
    }
}
