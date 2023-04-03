<?php

use Aimanong\Amischs\Amischs;
use Aimanong\Amischs\module_type\Page;

require_once('../vendor/autoload.php');
$page = new Page();
//$page->设置页面标题('我是页面标题~哈哈');
//$page->设置页面副标题('我是副标题');
$page->设置标题提示('我就是提示一下');
$page->setAside('左边内容');
//$page->设置是否固定左边栏区域(false);
$page->设置边栏区域最小宽度(10);
$page->设置边栏区域最大宽度(400);
$page->设置是否可调整左边栏区域(true);
$page->设置右上角的内容('我是右上角的内容');
$page->设置主体数据内容('我是主体内容');
echo(Amischs::create($page,'这就是一个测试页面'));