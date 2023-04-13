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
     * sidebar 模式下，标签栏位置
     * @var string
     */
    protected string $sidePosition = 'left';
    public array $tabsModeArray = [
        '简约' => 'simple',
        '加强' => 'strong',
        '线型' => 'line',
        '卡片' => 'card',
        '仿chrome' => 'chrome',
        '水平铺满' => 'tiled',
        '选择器型' => 'radio',
        '垂直' => 'vertical',
        '侧边栏模式' => 'sidebar'
    ];
    /**
     * TabsGroup Dom 的类名
     * @var ClassName|string
     */
    protected ClassName|string $tabsClassName = '';
    /**
     * 只有在点中 tab 的时候才渲染
     * @var bool
     */
    protected bool $mountOnEnter = false;
    /**
     * 切换 tab 的时候销毁
     * @var bool
     */
    protected bool $unmountOnExit = false;
    /**
     * 是否支持新增
     * @var bool
     */
    protected bool $addable = false;
    /**
     * 新增按钮文案
     * @var string
     */
    protected string $addBtnText = '';
    /**
     * 是否支持删除
     * @var bool
     */
    protected bool $closable = false;
    /**
     * 是否支持拖拽
     * @var bool
     */
    protected bool $draggable = false;
    /**
     * 是否支持提示
     * @var bool
     */
    protected bool $showTip = false;
    /**
     * 提示的类
     * @var string
     */
    protected string $showTipClassName = '';
    /**
     * 是否可编辑标签名
     * @var bool
     */
    protected bool $editable = false;
    /**
     * 当 tabs 超出多少个时开始折叠
     * @var int
     */
    protected int $collapseOnExceed = 0;
    /**
     * 用来设置折叠按钮的文字
     * @var string
     */
    protected string $collapseBtnLabel = '更多';
    /**
     * tabs内容
     * @var array
     */
    protected array $tabs = [];
    /**
     * tabs 关联数据，关联后可以重复生成选项卡
     * @var string
     */
    protected string $source = '';
    /**
     * tabs 中的工具栏
     * @var array
     */
    protected array $toolbar = [];
    /**
     * tabs 中工具栏的类名
     * @var string
     */
    protected string $toolbarClassName = '';

    public function setToolbarClassName(string $toolbarClassName): static
    {
        if(!empty($toolbarClassName)){
            $this->toolbarClassName = $toolbarClassName;
        }
        return $this;
    }
    public function setToolbar(array $toolbar): static
    {
        if(!empty($toolbar)){
            $this->toolbar = $toolbar;
        }
        return $this;
    }

    public function setSource(string $source): static
    {
        if(!empty($source)){
            $this->source = $source;
        }
        return $this;
    }

    public function addTabs(array|string $tabs): static
    {
        $this->tabs[] = $tabs;
        return $this;
    }

    public function setCollapseOnExceed(int $collapseOnExceed = 0, string $collapseBtnLabel = '更多'): static
    {
        if(!empty($collapseOnExceed)){
            $this->collapseOnExceed = $collapseOnExceed;
            $this->collapseBtnLabel = $collapseBtnLabel;
        }
        return $this;
    }
    public function setEditable(bool $editable = false): static
    {
        if(!empty($editable)){
            $this->editable = true;
        }
        return $this;
    }

    public function setShowTip(bool $showTip, string $showTipClassName = ''): static
    {
        if(!empty($showTip)){
            $this->showTip = true;
            if(!empty($showTipClassName)){
                $this->showTipClassName = $showTipClassName;
            }
        }
        return $this;
    }

    public function setDraggable(bool $draggable = false): static
    {
        if(!empty($draggable)){
            $this->draggable = true;
        }
        return $this;
    }
    public function setClosable(bool $closable = false): static
    {
        if(!empty($closable)){
            $this->closable = true;
        }
        return $this;
    }

    public function setAddable(bool $addable = false, string $addBtnText = '增加'): static
    {
        if(!empty($addable)){
            $this->addable = true;
            $this->addBtnText = $addBtnText;
        }
        return $this;
    }
    public function setUnmountOnExit(bool $unmountOnExit): static
    {
        if(!empty($unmountOnExit)){
            $this->unmountOnExit = true;
        }
        return $this;
    }
    public function setMountOnEnter(bool $mountOnEnter): static
    {
        if(!empty($mountOnEnter)){
            $this->mountOnEnter = true;
        }
        return $this;
    }

    public function setTabsClassName(string $tabsClassName): static
    {
        $this->tabsClassName = $tabsClassName;
        return $this;
    }
    public function setTabsMode(string $tabsMode, string $sidePosition = 'left'): static
    {
        $this->tabsMode = $tabsMode;
        if($tabsMode === 'sidebar' && $sidePosition != 'left'){
            $this->sidePosition = 'right';
        }
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
        $data = [];
        $data['type'] = 'tabs';
        if(!empty($this->defaultKey)){
            $data['defaultKey'] = $this->defaultKey;
        }
        if(!empty($this->activeKey)){
            $data['activeKey'] = $this->activeKey;
        }
        if(!empty($this->className)){
            $data['className'] = $this->className;
        }
        if(!empty($this->tabsMode)){
            $data['tabsMode'] = $this->tabsMode;
            if($this->tabsMode === 'sidebar' && !empty($this->sidePosition) && $this->sidePosition != 'left'){
                $data['sidePosition'] = $this->sidePosition;
            }
        }
        if(!empty($this->tabsClassName)){
            $data['tabsClassName'] = $this->tabsClassName;
        }
        if(!empty($this->tabs)){
            $data['tabs'] = $this->tabs;
        }
        if(!empty($this->source)){
            $data['source'] = $this->source;
        }
        if(!empty($this->toolbar)){
            $data['toolbar'] = $this->toolbar;
        }
        if(!empty($this->toolbarClassName)){
            $data['toolbarClassName'] = $this->toolbarClassName;
        }
        if(!empty($this->mountOnEnter)){
            $data['mountOnEnter'] = $this->mountOnEnter;
        }
        if(!empty($this->unmountOnExit)){
            $data['unmountOnExit'] = $this->unmountOnExit;
        }
        if(!empty($this->addable)){
            $data['addable'] = $this->addable;
            $data['addBtnText'] = $this->addBtnText;
        }
        if(!empty($this->closable)){
            $data['closable'] = $this->closable;
        }
        if(!empty($this->draggable)){
            $data['draggable'] = $this->draggable;
        }
        if(!empty($this->showTip)){
            $data['showTip'] = $this->showTip;
            if(!empty($this->showTipClassNamew)){
                $data['showTipClassNamew'] = $this->showTipClassNamew;
            }
        }
        if(!empty($this->editable)){
            $data['editable'] = $this->editable;
        }
        if(!empty($this->collapseOnExceed)){
            $data['collapseOnExceed'] = $this->collapseOnExceed;
            $data['collapseBtnLabel'] = $this->collapseBtnLabel;
        }
        return $data;
    }
}