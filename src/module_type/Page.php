<?php
/**
 * amis的page组件
 *
 * PHP version 8.0
 *
 * @package Aimanong\Amischs\module_type
 * @access public
 * @author 阮三 <zyzyzzy@vip.qq.com>
 * @copyright 2023 amischs
 * @example /src/module_type/
 * @version 1.0.0
 *
 */

namespace Aimanong\Amischs\module_type;

use Aimanong\Amischs\Api;
use Aimanong\Amischs\attribute\ClassName;
use Aimanong\Amischs\Condition;
use Aimanong\Amischs\Module;
use Aimanong\Amischs\SchemaNode;


class Page extends Module
{
    /**
     * 页面副标题
     * @var SchemaNode|string|array
     */
    protected SchemaNode|string|array $subTitle = '';

    /**
     * 标题附近会出现一个提示图标,鼠标放上去会提示该内容
     * @var Remark|array
     */
    protected Remark|array $remark = [];

    /**
     * 往页面的边栏区域加内容
     * @var SchemaNode|string|array
     */
    protected SchemaNode|string|array $aside = '';

    /**
     * 页面的边栏区域宽度是否可以调整
     * @var bool
     */
    protected bool $asideResizor = false;

    /**
     * 页面边栏区域的最小宽度 单位像素(px)
     * @var int
     */
    protected int $asideMinWidth = 0;

    /**
     * 页面边栏区域的最大宽度 单位像素(px)
     * @var int
     */
    protected int $asideMaxWidth = 0;

    /**
     * 页面边栏区域是否固定
     * @var bool
     */
    protected bool $asideSticky = true;

    /**
     * 往页面的右上角加内容，需要注意的是，当有 title 时，该区域在右上角，没有时该区域在顶部
     * @var SchemaNode|string|array
     */
    protected SchemaNode|string|array $toolbar = '';

    /**
     * 自定义CSS变量
     * @var array
     */
    protected array $cssVars = [];

    /**
     * Toolbar dom 类名
     * @var ClassName|string
     */
    protected ClassName|string $toolbarClassName = '';

    /**
     * Body dom 类名
     * @var ClassName|string
     */
    protected ClassName|string $bodyClassName = '';

    /**
     * Aside dom 类名
     * @var ClassName|string
     */
    protected ClassName|string $asideClassName = '';

    /**
     * Header 区域 dom 类名
     * @var ClassName|string
     */
    protected ClassName|string $headerClassName = '';

    /**
     * Page 用来获取初始数据的 api。返回的数据可以整个 page 级别使用
     * @var Api|string
     */
    protected Api|string $initApi = '';

    /**
     * 是否起始拉取 initApi, 通过表达式配置
     * @var Condition|string
     */
    protected Condition|string $initFetchOn = '';

    /**
     * 刷新时间(最小 1000) 单位毫秒
     * @var int
     */
    protected int $interval = 0;

    /**
     * 配置刷新时是否显示加载动画
     * @var bool
     */
    protected bool $silentPolling = false;

    /**
     * 通过表达式来配置停止刷新的条件
     * @var Condition|string
     */
    protected Condition|string $stopAutoRefreshWhen = '';

    /**
     * @param SchemaNode|string|array $title
     * @return $this
     */

    /**
     * @param SchemaNode|string|array $subTitle
     * @return $this
     */
    public function setSubTitle(SchemaNode|string|array $subTitle): static
    {
        $this->subTitle = $subTitle;
        return $this;
    }

    /**
     * @param string|Remark $contentOrRemark
     * @return $this
     */
    public function setRemark(string|Remark $contentOrRemark): static
    {
        if($contentOrRemark instanceof Remark){
            $this->remark = $contentOrRemark;
        }else{
            $remark = new Remark();
            $remark->setContent($contentOrRemark);
            $this->remark = $remark;
        }
        return $this;
    }

    /**
     * @param SchemaNode|array|string $aside
     * @return $this
     */
    public function setAside(SchemaNode|array|string $aside): static
    {
        if(!empty($aside)){
            $this->aside = $aside;
        }
        return $this;
    }

    /**
     * @param bool $asideResizor
     * @return $this
     */
    public function setAsideResizor(bool $asideResizor): static
    {
        $this->asideResizor = $asideResizor;
        return $this;
    }

    /**
     * @param bool $asideSticky
     * @return $this
     */
    public function setAsideSticky(bool $asideSticky): static
    {
        $this->asideSticky = $asideSticky;
        return $this;
    }

    /**
     * @param int $asideMinWidth
     * @return $this
     */
    public function setAsideMinWidth(int $asideMinWidth): static
    {
        $this->asideMinWidth = $asideMinWidth;
        return $this;
    }

    /**
     * @param int $asideMaxWidth
     * @return $this
     */
    public function setAsideMaxWidth(int $asideMaxWidth): static
    {
        $this->asideMaxWidth = $asideMaxWidth;
        return $this;
    }

    /**
     * @param SchemaNode|string|array $toolbar
     * @return $this
     */
    public function setToolbar(SchemaNode|string|array $toolbar): static
    {
        if(!empty($toolbar)){
            $this->toolbar = $toolbar;
        }
        return $this;
    }

    /**
     * @param array $cssVars
     * @return $this
     */
    public function setCssVars(array $cssVars): static
    {
        $this->cssVars = $cssVars;
        return $this;
    }

    /**
     * @param ClassName|string $toolbarClassName
     * @return $this
     */
    public function setToolbarClassName(ClassName|string $toolbarClassName): static
    {
        $this->toolbarClassName = $toolbarClassName;
        return $this;
    }

    /**
     * @param ClassName|string $bodyClassName
     * @return $this
     */
    public function setBodyClassName(ClassName|string $bodyClassName): static
    {
        $this->bodyClassName = $bodyClassName;
        return $this;
    }

    /**
     * @param ClassName|string $asideClassName
     * @return $this
     */
    public function setAsideClassName(ClassName|string $asideClassName): static
    {
        $this->asideClassName = $asideClassName;
        return $this;
    }

    /**
     * @param ClassName|string $headerClassName
     * @return $this
     */
    public function setHeaderClassName(ClassName|string $headerClassName): static
    {
        $this->headerClassName = $headerClassName;
        return $this;
    }

    /**
     * @param Api $initApi
     * @return $this
     */
    public function setInitApi(Api $initApi): static
    {
        $this->initApi = $initApi;
        return $this;
    }

    /**
     * @param Condition $initFetchOn
     * @return $this
     */
    public function setInitFetchOn(Condition $initFetchOn): static
    {
        $this->initFetchOn = $initFetchOn;
        return $this;
    }

    /**
     * @param Condition $stopAutoRefreshWhen
     * @return $this
     */
    public function setStopAutoRefreshWhen(Condition $stopAutoRefreshWhen): static
    {
        $this->stopAutoRefreshWhen = $stopAutoRefreshWhen;
        return $this;
    }

    /**
     * @param int $interval
     * @return $this
     */
    public function setInterval(int $interval): static
    {
        $this->interval = $interval*1000;
        return $this;
    }

    /**
     * @param bool $silentPolling
     * @return $this
     */
    public function setSilentPolling(bool $silentPolling): static
    {
        $this->silentPolling = $silentPolling;
        return $this;
    }

    /**
     * @return array
     */
    public function create(): array
    {
        $data = [];
        $data['type'] = 'page';

        if($this->title instanceof SchemaNode){
            $data['title'] = ($this->title)->create();
        }elseif(!empty($this->title)){
            $data['title'] = $this->title;
        }
        if(!empty($this->title)){
            if($this->remark instanceof Remark){
                $data['remark'] = ($this->remark)->create();
            }
        }

        if($this->subTitle instanceof SchemaNode){
            $data['subTitle'] = ($this->subTitle)->create();
        }elseif(!empty($this->subTitle)){
            $data['subTitle'] = $this->subTitle;
        }

        if($this->aside instanceof SchemaNode){
            $data['aside'] = ($this->aside)->create();
        }elseif(!empty($this->aside)){
            $data['aside'] = $this->aside;
        }

        if(!empty($this->aside)){
            $data['asideResizor'] = $this->asideResizor;
            if(!empty($this->asideMinWidth)){
                $data['asideMinWidth'] = $this->asideMinWidth;
            }
            if(!empty($this->asideMaxWidth)){
                $data['asideMaxWidth'] = $this->asideMaxWidth;
            }
            $data['asideSticky'] = $this->asideSticky;
        }

        if($this->toolbar instanceof SchemaNode){
            $data['toolbar'] = ($this->toolbar)->create();
        }elseif(!empty($this->toolbar)){
            $data['toolbar'] = $this->toolbar;
        }

        if($this->body instanceof SchemaNode){
            $data['body'] = ($this->body)->create();
        }elseif(!empty($this->body)){
            $data['body'] = $this->body;
        }

        if($this->className instanceof ClassName){
            $data['className'] = ($this->className)->create();
        }elseif(!empty($this->className)){
            $data['className'] = $this->className;
        }

        if(!empty($this->cssVars)){
            $data['cssVars'] = $this->cssVars;
        }

        if($this->toolbarClassName instanceof ClassName){
            $data['toolbarClassName'] = ($this->toolbarClassName)->create();
        }elseif(!empty($this->toolbarClassName)){
            $data['toolbarClassName'] = $this->toolbarClassName;
        }

        if($this->bodyClassName instanceof ClassName){
            $data['bodyClassName'] = ($this->bodyClassName)->create();
        }elseif(!empty($this->bodyClassName)){
            $data['bodyClassName'] = $this->bodyClassName;
        }

        if($this->asideClassName instanceof ClassName){
            $data['asideClassName'] = ($this->asideClassName)->create();
        }elseif(!empty($this->asideClassName)){
            $data['asideClassName'] = $this->asideClassName;
        }

        if($this->headerClassName instanceof ClassName){
            $data['headerClassName'] = ($this->headerClassName)->create();
        }elseif(!empty($this->headerClassName)){
            $data['headerClassName'] = $this->headerClassName;
        }

        if($this->initApi instanceof Api){
            $data['initApi'] = ($this->initApi)->create();
        }elseif(!empty($this->initApi)){
            $data['initApi'] = $this->initApi;
        }

        if(!empty($data['initApi'])){
            if($this->initFetchOn instanceof Condition){
                $data['initFetchOn'] = ($this->initFetchOn)->create();
            }elseif(!empty($this->initFetchOn)){
                $data['initFetchOn'] = $this->initFetchOn;
            }
            if(!empty($this->interval)){
                $data['interval'] = $this->interval;
            }
            $data['silentPolling'] = $this->silentPolling;
            if($this->stopAutoRefreshWhen instanceof Condition){
                $data['stopAutoRefreshWhen'] = ($this->stopAutoRefreshWhen)->create();
            }elseif(!empty($this->initApi)){
                $data['stopAutoRefreshWhen'] = $this->stopAutoRefreshWhen;
            }
        }
        return $data;
    }
}