<?php

namespace Aimanong\Amischs\module_type;

use Aimanong\Amischs\attribute\ClassName;

class 面板 extends Panel
{
    public function 设置header区域的类名(string $类名): static
    {
        $this->setHeaderClassName($类名);
        return $this;
    }

    public function 设置footer区域的类名(string $类名): static
    {
        $this->setFooterClassName($类名);
        return $this;
    }

    public function 设置actions区域的类名(string $类名): static
    {
        $this->setActionsClassName($类名);
        return $this;
    }

    public function 设置body区域的类名(string $类名): static
    {
        $this->setBodyClassName($类名);
        return $this;
    }

    public function 设置头部容器(string|array $头部容器): static
    {
        $this->setHeader($头部容器);
        return $this;
    }

    public function 设置底部容器(string|array $底部容器): static
    {
        $this->setFooterClassName($底部容器);
        return $this;
    }

    public function 设置是否固定底部容器(bool $是否固定底部容器): static
    {
        $this->setAffixFooter($是否固定底部容器);
        return $this;
    }

    public function 设置按钮区域(array $按钮): static
    {
        $this->setActions($按钮);
        return $this;
    }

    public function 创建()
    {
        return $this->create();
    }
}