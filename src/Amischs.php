<?php

namespace Aimanong\Amischs;

use Aimanong\Amischs\module_type\Page;

class Amischs
{
    public function __construct()
    {
    }

    /**
     * 生成HTML代码
     * @param Page|SchemaNode|string|array $amisJsonOrPage
     * @param string $htmlTitle html的title
     * @param string $htmlResources html的资源路径
     * @return string
     */
    public static function create(Page|SchemaNode|string|array $amisJsonOrPage = '', string $htmlTitle = 'aimanong', string $htmlResources = '/src/resources'): string
    {
        if($amisJsonOrPage instanceof Page){
            $page = $amisJsonOrPage;
        }else{
            $page = new Page();
            if ($amisJsonOrPage instanceof SchemaNode){
                $amisJson = $amisJsonOrPage->create();
            }else{
                $amisJson = $amisJsonOrPage;
            }
            $page->setBody($amisJson);

        }
        return (new Html($htmlTitle,$htmlResources,$page->create()));
    }
}