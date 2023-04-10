<?php

namespace Aimanong\Amischs;

use Aimanong\Amischs\attribute\ClassName;

abstract class Module
{
    protected string $type;
    protected bool $debug = false;
    protected array $data = []; //本域数据
    protected string|array $title = ''; //标题
    protected ClassName|string $className = ''; //外层 dom 类名
    protected string|array $body = []; //往页面的内容区域加内容
    public function __construct()
    {
    }

    public function setDebug(bool $debug): static
    {
        $this->debug = $debug;
        return $this;
    }

    public function 设置调试模式(bool $调试模式): static
    {
        $this->setDebug($调试模式);
        return $this;
    }

    public function setTitle(string|array $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function 设置标题(string|array $标题): static
    {
        $this->setTitle($标题);
        return $this;
    }

    public function setBody(string|array $body): static
    {
        $this->body[] = $body;
        return $this;
    }

    public function 设置主体数据内容(string|array $内容): static
    {
        return $this->setBody($内容);
    }

    public function setClassName(ClassName|string $className): static
    {
        if(!empty($className)){
            $this->className = $className;
        }
        return $this;
    }

    public function 设置外层类名(ClassName|string $类名): static
    {
        return $this->setClassName($类名);
    }

    public function setData(array $data): static
    {
        $this->data[] = $data;
        return $this;
    }

    public function 设置本域数据(array $本域数据): static
    {
        return $this->setData($本域数据);
    }


    abstract public function create(): array;
}