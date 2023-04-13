<?php

namespace Aimanong\Amischs\module_type;

class 选项卡 extends Tabs
{
    public function 设置哈希键(string $哈希键): 选项卡
    {
        return $this->setHash($哈希键);
    }
    public function 设置禁用(bool $是否禁用): 选项卡
    {
        return $this->setDisabled($是否禁用);
    }
    public function 设置可删除(bool $是否可删除): 选项卡
    {
        return $this->setClosable($是否可删除);
    }

    public function 设置每次重新渲染(bool $是否每次重新渲染): 选项卡
    {
        return $this->setReload($是否每次重新渲染);
    }
    public function 设置退出时销毁(bool $是否退出时销毁): 选项卡
    {
        return $this->setUnmountOnExit($是否退出时销毁);
    }
    public function 设置参数并创建(
        string $标题 = '',
        array $主体内容 = [],
        string $哈希键 = '',
        string $图标 = '',
        string $图标位置 = '',
        bool $每次重新渲染 = false,
        bool $退出时销毁 = false,
        bool $可删除 = false,
        bool $禁用 = false,
        string $外层类名 = ''
    ): array
    {
        return $this->setParameter($标题,$主体内容,$哈希键,$图标,$图标位置,$每次重新渲染,$退出时销毁,$可删除,$禁用,$外层类名);
    }

    public function 创建(): array
    {
        return $this->create();
    }
}