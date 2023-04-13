<?php

namespace Aimanong\Amischs\module_type;

class 选项卡组 extends TabsGroup
{
    public function 设置Tabs中工具栏的类名(string $类名): 选项卡组
    {
        return $this->setToolbarClassName($类名);
    }
    public function 设置Tabs中的工具栏(array $工具栏内容): 选项卡组
    {
        return $this->setToolbar($工具栏内容);
    }
    public function 设置数据源(string $数据源): 选项卡组
    {
        return $this->setSource($数据源);
    }
    public function 添加Tabs(array|string $内容): 选项卡组
    {
        return $this->addTabs($内容);
    }
    public function 设置Tabs超出折叠(int $超出多少个开始折叠 = 0, string $折叠按钮的文字 = '更多'): 选项卡组
    {
        return $this->setCollapseOnExceed($超出多少个开始折叠,$折叠按钮的文字);
    }
    public function 设置是否可编辑标签(bool $是否可编辑标签): 选项卡组
    {
        return $this->setEditable($是否可编辑标签);
    }
    public function 设置是否显示提示(bool $是否显示提示): 选项卡组
    {
        return $this->setShowTip($是否显示提示);
    }
    public function 设置是否支持拖拽标签(bool $是否支持拖拽标签): 选项卡组
    {
        return $this->setDraggable($是否支持拖拽标签);
    }
    public function 设置是否支持删除标签(bool $是否支持删除标签): 选项卡组
    {
        return $this->setClosable($是否支持删除标签);
    }
    public function 设置是否支持新增标签(bool $是否支持新增标签 = false, string $新增按钮的文字 = '增加'): 选项卡组
    {
        return $this->setAddable($是否支持新增标签,$新增按钮的文字);
    }
    public function 设置是否切换时销毁标签内容(bool $是否): 选项卡组
    {
        return $this->setUnmountOnExit($是否);
    }
    public function 设置是否只有点中的时候才渲染(bool $是否): 选项卡组
    {
        return $this->setMountOnEnter($是否);
    }
    public function 设置Tabs外层的类名(string $类名): 选项卡组
    {
        return $this->setTabsClassName($类名);
    }
    public function 设置展示模式(string $展示模式, string $侧边栏模式下的方向 = 'left'): 选项卡组
    {
        return $this->setTabsMode($展示模式,$侧边栏模式下的方向);
    }
    public function 设置激活选项卡(string $选项卡hash值或索引值): 选项卡组
    {
        return $this->setActiveKey($选项卡hash值或索引值);
    }
    public function 设置初始化时激活的选项卡(string $选项卡hash值或索引值): 选项卡组
    {
        return $this->setDefaultKey($选项卡hash值或索引值);
    }
    public function 创建(): array
    {
        return $this->create();
    }
}