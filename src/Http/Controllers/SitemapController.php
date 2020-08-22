<?php

declare(strict_types=1);

namespace Chinstrap\Plugins\DynamicSitemap\Http\Controllers;

use Laminas\Diactoros\Response\XmlResponse;
use Chinstrap\Core\Contracts\Generators\Sitemap;

final class SitemapController
{
    /**
     * @var Sitemap
     */
    private $sitemap;

    public function __construct(Sitemap $sitemap)
    {
        $this->sitemap = $sitemap;
    }

    public function index(): XmlResponse
    {
        return new XmlResponse(
            $this->sitemap->__invoke(),
            200,
            ['Content-Type' => ['text/xml']]
        );
    }
}
