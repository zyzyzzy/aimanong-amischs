<?php

namespace Aimanong\Amischs\module_type;

use Aimanong\Amischs\Module;

class CollapseGroup extends Module
{
    /**
     * 初始化激活面板的key
     * @var array
     */
    protected array $activeKey;

    /**
     * 手风琴模式,默认否
     * @var bool
     */
    protected bool $accordion = false;

    /**
     * 设置图标位置,可选值 left|right
     * @var string
     */
    protected string $expandIconPosition = 'left';
    protected array $collapseBody = [];

    /**
     * 设置初始化激活面板的Key
     * @param string|int $activeKey
     * @return $this
     */
    public function setActiveKey(string|int $activeKey): static
    {
        $this->activeKey[] = strval($activeKey);
        return $this;
    }

    /**
     * 开启或关闭手风琴模式
     * @param bool $accordion
     * @return $this
     */
    public function setAccordion(bool $accordion): static
    {
        $this->accordion = $accordion;
        return $this;
    }

    /**
     * 设置图标位置,可选值 left | right
     * @param string $expandIconPosition
     * @return $this
     */
    public function setExpandIconPosition(string $expandIconPosition): static
    {
        $this->expandIconPosition = match ($expandIconPosition){
            'right' => 'right',
            default => 'left'
        };
        return $this;
    }

    public function addCollapse(array $collapse): static
    {
        $this->collapseBody[] = (new Collapse(key:$collapse[0],header: $collapse[1],body: $collapse[2]))->create() ;
        return $this;
    }


    public function create(): array
    {
        $data = [];
        $data['type'] = 'collapse-group';
        $data['activeKey'] = $this->activeKey;
        empty($this->accordion) || ($data['accordion'] = true);
        ($this->expandIconPosition === 'left') || ($data['expandIconPosition'] = 'right');
        $data['body'] = $this->collapseBody;
        return $data;
    }
}