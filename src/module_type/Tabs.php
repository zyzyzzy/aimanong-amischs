<?php

namespace Aimanong\Amischs\module_type;

use Aimanong\Amischs\Module;

class Tabs extends Module
{
    /**
     * 继承父类的属性
     * protected string|array $title
     * protected string $icon = '';
     * protected string $iconPosition = '';
     * protected string|array $body  对应tab属性
     */
    /*---------------------------------------------------*/
    /**
     * 设置以后内容每次都会重新渲染，对于 crud 的重新拉取很有用
     * @var bool
     */
    protected bool $reload = false;
    /**
     * 每次退出都会销毁当前 tab 栏内容
     * @var bool
     */
    protected bool $unmountOnExit = false;
    /**
     * 是否支持删除，优先级高于组件的 closable
     * @var bool
     */
    protected bool $closable = false;
    /**
     * 是否禁用
     * @var bool
     */
    protected bool $disabled = false;
    /**
     * 设置以后将跟 url 的 hash 对应
     * @var string
     */
    protected string $hash = '';

    public function setHash(string $hash): static
    {
        if(!empty($this->hash)){
            $this->hash = $hash;
        }
        return $this;
    }

    public function setDisabled(bool $disabled): static
    {
        if(!empty($disabled)){
            $this->disabled = $disabled;
        }
        return $this;
    }

    public function setClosable(bool $closable): static
    {
        if(!empty($closable)){
            $this->closable = true;
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
    public function setReload(bool $reload): static
    {
        if(!empty($reload)){
            $this->reload = true;
        }
        return $this;
    }

    public function setParameter(
        string $title = '',
        array $tabs = [],
        string $hash = '',
        string $icon = '',
        string $iconPosition = '',
        bool $reload = false,
        bool $unmountOnExit = false,
        bool $closable = false,
        bool $disabled = false,
        string $className = ''
    ): array
    {
        $this->title = $title;
        $this->body = $tabs;
        $this->hash = $hash;
        $this->icon = $icon;
        $this->iconPosition = $iconPosition;
        $this->reload = $reload;
        $this->unmountOnExit = $unmountOnExit;
        $this->closable = $closable;
        $this->disabled = $disabled;
        $this->className = $className;
        return $this->create();
    }

    public function create(): array
    {
        $data = [];
        $data['title'] = $this->title;
        $data['tab'] = $this->body;
        if(!empty($this->hash)){
            $data['hash'] = $this->hash;
        }
        if(!empty($this->icon)){
            $data['icon'] = $this->icon;
        }
        if(!empty($this->iconPosition) && $this->iconPosition != 'left'){
            $data['iconPosition'] = $this->iconPosition;
        }
        if(!empty($this->reload)){
            $data['reload'] = $this->reload;
        }
        if(!empty($this->unmountOnExit)){
            $data['unmountOnExit'] = $this->unmountOnExit;
        }
        if(!empty($this->closable)){
            $data['closable'] = $this->closable;
        }
        if(!empty($this->disabled)){
            $data['disabled'] = $this->disabled;
        }
        if(!empty($this->className)){
            $data['className'] = $this->className;
        }
        return $data;
    }
}