<?php

namespace Aimanong\Amischs\module_type;

use Aimanong\Amischs\Api;
use Aimanong\Amischs\attribute\ClassName;
use Aimanong\Amischs\Condition;
use Aimanong\Amischs\SchemaNode;

class 页面 extends Page
{
    /**
     * @param SchemaNode|string|array $title
     * @return $this
     */
    public function 设置页面标题(SchemaNode|string|array $title): static
    {
        return $this->setTitle($title);
    }

    /**
     * @param SchemaNode|string|array $subTitle
     * @return $this
     */
    public function 设置页面副标题(SchemaNode|string|array $subTitle): static
    {
        return $this->setSubTitle($subTitle);
    }

    /**
     * @param string|Remark $提示内容或实例
     * @return $this
     */
    public function 设置标题提示(string|Remark $提示内容或实例): static
    {
        return $this->setRemark($提示内容或实例);
    }

    /**
     * @param SchemaNode|array|string $内容
     * @return $this
     */
    public function 设置左边栏区域内容(SchemaNode|array|string $内容): static
    {
        return $this->setAside($内容);
    }

    /**
     * @param bool $是否可调整
     * @return $this
     */
    public function 设置是否可调整左边栏区域(bool $是否可调整): static
    {
        return $this->setAsideResizor($是否可调整);
    }

    /**
     * @param bool $是否固定
     * @return $this
     */
    public function 设置是否固定左边栏区域(bool $是否固定): static
    {
        return $this->setAsideSticky($是否固定);
    }

    /**
     * @param int $边栏区域最小宽度
     * @return $this
     */
    public function 设置边栏区域最小宽度(int $边栏区域最小宽度): static
    {
        return $this->setAsideMinWidth($边栏区域最小宽度);
    }

    /**
     * @param int $边栏区域最大宽度
     * @return $this
     */
    public function 设置边栏区域最大宽度(int $边栏区域最大宽度): static
    {
        return $this->setAsideMaxWidth($边栏区域最大宽度);
    }

    /**
     * @param SchemaNode|string|array $内容
     * @return $this
     */
    public function 设置右上角的内容(SchemaNode|string|array $内容): static
    {
        return $this->setToolbar($内容);
    }

    /**
     * @param array $自定义变量
     * @return $this
     */
    public function 设置自定义CSS变量(array $自定义变量): static
    {
        return $this->setCssVars($自定义变量);
    }

    /**
     * @param ClassName|string $类名
     * @return $this
     */
    public function 设置右上角内容的类名(ClassName|string $类名): static
    {
        return $this->setToolbarClassName($类名);
    }

    /**
     * @param ClassName|string $类名
     * @return $this
     */
    public function 设置主体区域的类名(ClassName|string $类名): static
    {
        return $this->setBodyClassName($类名);
    }

    /**
     * @param ClassName|string $类名
     * @return $this
     */
    public function 设置左边栏区域类名(ClassName|string $类名): static
    {
        return $this->setAsideClassName($类名);
    }

    /**
     * @param ClassName|string $类名
     * @return $this
     */
    public function 设置顶部区域类名(ClassName|string $类名): static
    {
        return $this->setHeaderClassName($类名);
    }

    /**
     * @param Api $接口
     * @return $this
     */
    public function 设置初始拉取数据接口(Api $接口): static
    {
        return $this->setInitApi($接口);
    }

    /**
     * @param Condition $表达式
     * @return $this
     */
    public function 设置初始拉取数据的表达式条件(Condition $表达式): static
    {
        return $this->setInitFetchOn($表达式);
    }

    /**
     * @param Condition $表达式
     * @return $this
     */
    public function 设置停止刷新拉取数据条件(Condition $表达式): static
    {
        return $this->setStopAutoRefreshWhen($表达式);
    }

    /**
     * @param int $刷新时间
     * @return $this
     */
    public function 设置刷新拉取数据的时间(int $刷新时间): static
    {
        return $this->setInterval($刷新时间);
    }

    /**
     * @param bool $是否加载刷新动画
     * @return $this
     */
    public function 设置是否加载刷新动画(bool $是否加载刷新动画): static
    {
        return $this->setSilentPolling($是否加载刷新动画);
    }

    public function 创建(): array
    {
        return $this->create();
    }
}