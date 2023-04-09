<?php

namespace Aimanong\Amischs\module_type;

use Aimanong\Amischs\attribute\ClassName;
use Aimanong\Amischs\Module;
use Aimanong\Amischs\SchemaNode;

class Panel extends Module
{
    /**
     * header区域的类名
     * @var ClassName|string
     */
    protected ClassName|string $headerClassName = 'panel-heading';
    /**
     * footer区域的类名
     * @var ClassName|string
     */
    protected ClassName|string $footerClassName = 'panel-footer bg-light lter wrapper';
    /**
     * actions区域的类名
     * @var ClassName|string
     */
    protected ClassName|string $actionsClassName = 'panel-footer';
    /**
     * body区域的类名
     * @var ClassName|string
     */
    protected ClassName|string $bodyClassName = 'panel-body';
    /**
     * 头部容器
     * @var array
     */
    protected array $header = [];
    /**
     * 底部容器
     * @var array
     */
    protected array $footer = [];
    /**
     * 是否固定底部容器
     * @var bool
     */
    protected bool $affixFooter = false;
    /**
     * 按钮区域
     * @var array
     */
    protected array $actions = [];

    public function setHeaderClassName(string $headerClassName): static
    {
        $this->headerClassName .= ' '.$headerClassName;
        return $this;
    }

    public function setFooterClassName(string $footerClassName): static
    {
        $this->footerClassName .= ' '.$footerClassName;
        return $this;
    }

    public function setActionsClassName(string $actionsClassName): static
    {
        $this->actionsClassName .= ' '.$actionsClassName;
        return $this;
    }

    public function setBodyClassName(string $bodyClassName): static
    {
        $this->bodyClassName .= ' '.$bodyClassName;
        return $this;
    }
    public function setHeader(string|array $header): static
    {
        $this->header[] = $header;
        return $this;
    }

    public function setFooter(string|array $footer): static
    {
        $this->footer[] = $footer;
        return $this;
    }

    public function setAffixFooter(bool $affixFooter): static
    {
        $this->affixFooter = $affixFooter;
        return $this;
    }

    public function setActions(array $actions): static
    {
        $this->actions[] = $actions;
        return $this;
    }

    public function create(): array
    {
        $data = [];
        $data['type'] = 'panel';
        empty($this->className) || ($data['className'] = $this->className);
        empty($this->headerClassName) || ($this->headerClassName == 'panel-default') || ($data['headerClassName'] = $this->headerClassName);
        empty($this->footerClassName) || ($this->footerClassName == 'panel-footer bg-light lter wrapper') || ($data['footerClassName'] = $this->footerClassName);
        empty($this->actionsClassName) || ($this->actionsClassName == 'panel-footer') || ($data['actionsClassName'] = $this->actionsClassName);
        empty($this->bodyClassName) || ($this->bodyClassName == 'panel-body') || ($data['bodyClassName'] = $this->bodyClassName);
        empty($this->title) || ($data['title'] = $this->title);
        empty($this->header) || ($data['header'] = $this->header);
        empty($this->body) || ($data['body'] = $this->body);
        empty($this->footer) || ($data['footer'] = $this->footer);
        empty($this->actions) || ($data['actions'] = $this->actions);
        $data['affixFooter'] = $this->affixFooter;
        return  $data;
    }
}