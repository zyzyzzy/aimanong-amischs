<?php

namespace Aimanong\Amischs\module_type;

use Aimanong\Amischs\Module;

class Remark extends Module
{
    public string $type = 'remark';
    /**
     * 数据类型为字符串时为提示文本
     * 数据类型为数组时,分为title(标题)和body(提示内容)
     * @var string|array
     */
    protected string|array $content = '';
    protected string $shape = 'square'; //图标形态  square方形, circle圆形
    protected string $placement = 'right'; //弹出位置 top向上,bottom向下,left向左,right向右
    protected string $trigger = 'hover'; //触发条件 hover悬浮,focus获取焦点
    protected string $icon = '';  //icon图标

    public function setContent(string $content,string $title = ''): static
    {
        if(empty($title)){
            $this->content = $content;
        }else{
            $this->content = [
                'title' => $title,
                'body' => $content
            ];
        }
        return $this;
    }

    public function 设置提示内容(string $提示内容,string $标题 = ''): static
    {
        return $this->setContent($提示内容,$标题);
    }

    public function setShape(string $shape): static
    {
        $this->shape = $shape;
        return $this;
    }

    public function 设置图标形状(string $图标形状): static
    {
        $shape = match ($图标形状){
            '方形' => 'square',
            default => 'circle'
        };
        return $this->setShape($shape);
    }
    
    public function setPlacement(string $placement): static
    {
        $this->placement = $placement;
        return $this;
    }

    public function 设置弹出位置(string $弹出位置): static
    {
        $placement = match ($弹出位置){
            '上' => 'top',
            '下' => 'bottom',
            '左' => 'left',
            default => 'right'
        };
        return $this->setPlacement($placement);
    }

    public function setIcon(string $icon): string
    {
        return $this->icon = $icon;
    }

    public function 设置图标(string $图标): string
    {
        return $this->setIcon($图标);
    }

    public function create(): array
    {
        $data = [
            'type' => 'remark',
            'content' => $this->content,
        ];
        ($this->debug === false) || ($data['debug'] = true);
        if(!empty($this->placement) && $this->placement != 'right'){
            $data['placement'] = $this->placement;
        }
        if(!empty($this->trigger) && $this->trigger != 'hover'){
            $data['trigger'] = $this->trigger;
        }
        if(!empty($this->icon)){
            $data['icon'] = $this->icon;
        }
        if(!empty($this->shape) && $this->shape != 'square'){
            $data['shape'] = $this->shape;
        }
        return $data;
    }

    public function 创建(): array
    {
        return $this->create();
    }
}