<?php

namespace Aimanong\Amischs;

use Aimanong\Amischs\module_type\CollapseGroup;
use Aimanong\Amischs\module_type\Divider;
use Aimanong\Amischs\module_type\Page;
use Aimanong\Amischs\module_type\Panel;
use Aimanong\Amischs\module_type\Tabs;
use Aimanong\Amischs\module_type\TabsGroup;
use Aimanong\Amischs\module_type\分割线;
use Aimanong\Amischs\module_type\折叠器组;
use Aimanong\Amischs\module_type\选项卡;
use Aimanong\Amischs\module_type\选项卡组;
use Aimanong\Amischs\module_type\面板;
use Aimanong\Amischs\module_type\页面;

class SchemaNode
{
    public function __construct()
    {
    }

    public function page(): Page
    {
        return new Page();
    }

    public function 页面(): 页面
    {
        return new 页面();
    }

    public function collapseGroup(): CollapseGroup
    {
        return new CollapseGroup();
    }

    public function 折叠器组(): 折叠器组
    {
        return new 折叠器组();
    }

    /**
     * 分割线
     * @return Divider
     */
    public function divider(): Divider
    {
       return new Divider();
    }

    public function 分割线(): 分割线
    {
        return new 分割线();
    }

    public function panel(): Panel
    {
        return new Panel();
    }

    public function 面板(): 面板
    {
        return new 面板();
    }

    public function tabsGroup(): TabsGroup
    {
        return new TabsGroup();
    }

    public function 选项卡组(): 选项卡组
    {
        return new 选项卡组();
    }

    public function tabs(): Tabs
    {
        return new Tabs();
    }

    public function 选项卡(): 选项卡
    {
        return new 选项卡();
    }

    public function create(string|object $objectName)
    {
        return is_object($objectName) ? $objectName->create() : ($this->$objectName)->create();
    }

    public function 创建(string|object $对象名)
    {
        return $this->create($对象名);
    }
}