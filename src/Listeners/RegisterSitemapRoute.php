<?php

declare(strict_types=1);

namespace Chinstrap\Plugins\DynamicSitemap\Listeners;

use Chinstrap\Core\Listeners\BaseListener;
use League\Event\EventInterface;
use League\Route\Router;

final class RegisterSitemapRoute extends BaseListener
{
    /**
     * @var Router
     */
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function handle(EventInterface $event)
    {
        $this->router->get('/sitemap', 'Chinstrap\Plugins\DynamicSitemap\Http\Controllers\SitemapController::index');
    }
}