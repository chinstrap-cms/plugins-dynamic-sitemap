<?php

declare(strict_types=1);

namespace Chinstrap\Plugins\DynamicSitemap\Tests;

use Chinstrap\Plugins\DynamicSitemap\Plugin;
use Chinstrap\Plugins\DynamicSitemap\Tests\TestCase;
use Mockery as m;

final class PluginTest extends TestCase
{
    public function testSetup()
    {
        $router = m::mock('League\Route\Router');
        $plugin = new Plugin($router);
        $router->shouldReceive('get')
            ->with('/sitemap', 'Chinstrap\Plugins\DynamicSitemap\Http\Controllers\SitemapController::index')
            ->once();
        $plugin->register();
    }
}
