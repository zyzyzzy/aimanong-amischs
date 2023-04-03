<?php

namespace Aimanong\Amischs;

use Aimanong\Amischs\attribute\ClassName;

abstract class Module
{
    protected string $type;
    protected array $data = []; //本域数据
    protected ClassName|string $className = ''; //外层 dom 类名
    protected SchemaNode|string|array $body = ''; //往页面的内容区域加内容
    public function __construct()
    {
    }

    public function setBody(SchemaNode|string|array $body): static
    {
        $this->body = $body;
        return $this;
    }

    public function 设置主体数据内容(SchemaNode|string|array $内容): static
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

    abstract public function create(): array;
    abstract public function 创建(): array;
}