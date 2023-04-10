<?php

namespace Aimanong\Amischs\module_type;

use Aimanong\Amischs\attribute\ClassName;
use Aimanong\Amischs\Module;

class TabsGroup extends Module
{
    /**
     * 组件初始化时激活的选项卡，hash 值或索引值，支持使用表达
     * @var string|int
     */
    protected string|int $defaultKey = '';
    /**
     * 激活的选项卡，hash 值或索引值，支持使用表达式，可响应上下文数据变化
     * @var string|int
     */
    protected string|int $activeKey = '';
    /**
     * 展示模式，取值可以是 line、card、radio、vertical、chrome、simple、strong、tiled、sidebar
     * @var string
     */
    protected string $tabsMode = '';
    /**
     * TabsGroup Dom 的类名
     * @var ClassName|string
     */
    protected ClassName|string $tabsClassName = '';

    public function setTabsClassName(string $tabsClassName): static
    {
        $this->tabsClassName = $tabsClassName;
        return $this;
    }
    public function setTabsMode(string $tabsMode): static
    {
        $this->tabsMode = $tabsMode;
        return $this;
    }
    public function setActiveKey(string|int $activeKey): static
    {
        $this->activeKey = $activeKey;
        return $this;
    }
    public function setDefaultKey(string|int $defaultKey): static
    {
        $this->defaultKey = $defaultKey;
        return $this;
    }
    public function create(): array
    {
        // TODO: Implement create() method.
    }
}