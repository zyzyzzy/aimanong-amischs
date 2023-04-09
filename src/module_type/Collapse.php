<?php

namespace Aimanong\Amischs\module_type;

use Aimanong\Amischs\Module;
use Aimanong\Amischs\SchemaNode;

class Collapse extends Module
{
    /**
     * 是否禁用,默认否
     * @var bool
     */
    protected bool $disabled = false;
    /**
     * 初始状态是否折叠
     * @var bool
     */
    protected bool $collapsed = true;
    /**
     * 标识
     * @var string|int
     */
    protected string|int $key;
    /**
     * 标题
     * @var string|SchemaNode
     */
    protected SchemaNode|string $header = '';
    /**
     * 是否展示图标
     * @var bool
     */
    protected bool $showArrow = true;

    /**
     * 设置是否禁用,默认 否
     * @param bool $disabled
     * @return $this
     */
    public function setDisabled(bool $disabled): static
    {
        $this->disabled = $disabled;
        return $this;
    }

    /**
     * 设置初始状态是否折叠, 默认 是
     * @param bool $collapsed
     * @return $this
     */
    public function setCollapsed(bool $collapsed): static
    {
        $this->collapsed = $collapsed;
        return $this;
    }

    /**
     * 设置是否展示图标 默认 是
     * @param bool $showArrow
     * @return $this
     */
    public function setShowArrow(bool $showArrow): static
    {
        $this->showArrow = $showArrow;
        return $this;
    }

    public function setKey(string|int $key): static
    {
        $this->key = $key;
        return $this;
    }

    public function setHeader(SchemaNode|string|array $header): static
    {
        $this->header = $header;
        return $this;
    }

    public function __construct(string|int $key = '', SchemaNode|string|array $header = '', SchemaNode|string|array $body = '')
    {
        empty($key) || $this->key = strval($key);
        empty($header) || $this->header = $header;
        empty($body) || $this->body = $body;
    }

    public function create(): array
    {
        $data = [];
        $data['type'] = 'collapse';
        $data['key'] = $this->key;
        $data['header'] = $this->header;
        $data['body'] = $this->body;
        empty($this->disabled) || ($data['disabled'] = true);
        !empty($this->collapsed) || ($data['collapsed'] = false);
        !empty($this->showArrow) || ($data['showArrow'] = false);
        return $data;
    }
}