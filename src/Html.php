<?php

namespace Aimanong\Amischs;

class Html
{
    private string $sdkcss = 'sdk.css';
    private string $helpercss = 'helper.css';
    private string $iconfontcss = 'iconfont.css';
    private string $sdkjs = 'sdk.js';
    private string $title = 'amischs';
    private string $html = '';

    /**
     * @param string $title  标题
     * @param string $resourcePath  资源路径
     * @param array $amisJson  主体JSON数据
     * @param array $amisPropsData 顶层数据
     * @param string $model 模式,单页 single 多页 multi
     */
    public function __construct( string $title = '', string $resourcePath = '', array $amisJson = [], array $amisPropsData = [], string $model = 'single')
    {
       empty($resourcePath) ?  : $this->setResourcePath($resourcePath);
       empty($title) ? : $this->title = $title;
       $this->html =  match ($model){
         'single' => $this->singlePageHtml($amisJson,$amisPropsData),
         'multi' => $this->multiPageHtml($amisJson,$amisPropsData)
       };
    }

    private function singlePageHtml(array $amisJson = [], array $amisPropsData  = []): string
    {
        $amisJson = json_encode($amisJson);
        $amisPropsData = json_encode(['data'=>$amisPropsData]);
        return <<<EOF
            <!DOCTYPE html>
            <html lang="zh">
                <head>
                    <meta charset="UTF-8" />
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
                    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
                    <link rel="stylesheet" href="$this->sdkcss" />
                    <link rel="stylesheet" href="$this->helpercss" />
                    <link rel="stylesheet" href="$this->iconfontcss" />
                    <title>$this->title</title>
                    <style>
                        html,
                        body,
                        .app-wrapper {
                            position: relative;
                            width: 100%;
                            height: 100%;
                            margin: 0;
                            padding: 0;
                        }
                    </style>
                </head>
                <body>
                    <div id="root" class="app-wrapper"></div>
                    <script src="$this->sdkjs"></script>
                    <script module_type="text/javascript">
                        (function(){
                            let amis = amisRequire('amis/embed');
                            let amisScopen = amis.embed('#root',$amisJson,$amisPropsData)
                        })();
                    </script>
                </body>
            </html>
        EOF;
    }

    private function multiPageHtml(array $amisJson = [], array $amisPropsData  = []): string
    {
        return '';
    }

    public function __toString()
    {
        return $this->html;
    }

    private function setResourcePath(string $resourcePath = ''): void
    {
        $this->sdkcss = $resourcePath.'/sdk.css';
        $this->helpercss = $resourcePath.'/helper.css';
        $this->iconfontcss = $resourcePath.'/iconfont.css';
        $this->sdkjs = $resourcePath.'/sdk.js';
    }
}