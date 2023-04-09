<?php

namespace Aimanong\Amischs\module_type;

class 折叠器组 extends CollapseGroup
{
    public function 设置初始化激活面板的键(string|int $键): static
    {
        $this->setActiveKey($键);
        return $this;
    }
    public function 设置手风琴模式(bool $是否): static
    {
        $this->setAccordion($是否);
        return $this;
    }

    public function 设置图标位置(string $位置): static
    {
        $this->setExpandIconPosition($位置);
        return $this;
    }

    public function 添加折叠器(array $折叠器): static
    {
        $this->addCollapse($折叠器);
        return $this;
    }
}