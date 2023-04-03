<?php

namespace Aimanong\Amischs\module_type;

use Aimanong\Amischs\Api;
use Aimanong\Amischs\attribute\ClassName;
use Aimanong\Amischs\Condition;
use Aimanong\Amischs\Module;
use Aimanong\Amischs\SchemaNode;

class Page extends Module
{
    public string $type = 'page';
    protected SchemaNode|string|array $title = ''; //页面标题
    protected SchemaNode|string|array $subTitle = ''; //页面副标题
    protected Remark|array $remark = [];  //标题附近会出现一个提示图标,鼠标放上去会提示该内容
    protected SchemaNode|string|array $aside = ''; //往页面的边栏区域加内容
    protected bool $asideResizor = false; //页面的边栏区域宽度是否可以调整
    protected int $asideMinWidth = 0;  //页面边栏区域的最小宽度 单位像素(px)
    protected int $asideMaxWidth = 0; //页面边栏区域的最大宽度 单位像素(px)
    protected bool $asideSticky = true; //页面边栏区域是否固定
    protected SchemaNode|string|array $toolbar = ''; //往页面的右上角加内容，需要注意的是，当有 title 时，该区域在右上角，没有时该区域在顶部
    protected array $cssVars = []; //自定义CSS变量
    protected ClassName|string $toolbarClassName = ''; //Toolbar dom 类名
    protected ClassName|string $bodyClassName = ''; //Body dom 类名
    protected ClassName|string $asideClassName = ''; //Aside dom 类名
    protected ClassName|string $headerClassName = ''; //Header 区域 dom 类名
    protected Api|string $initApi = ''; //Page 用来获取初始数据的 api。返回的数据可以整个 page 级别使用。
    protected Condition|string $initFetchOn = ''; //是否起始拉取 initApi, 通过表达式配置
    protected int $interval = 0; //刷新时间(最小 1000) 单位毫秒
    protected bool $silentPolling = false; //配置刷新时是否显示加载动画
    protected Condition|string $stopAutoRefreshWhen = ''; //通过表达式来配置停止刷新的条件

    public function setTitle(SchemaNode|string|array $title): static
    {
        $this->title = $title;
        return $this;
    }
    public function 设置页面标题(SchemaNode|string|array $title): static
    {
        return $this->setTitle($title);
    }

    public function setSubTitle(SchemaNode|string|array $subTitle): static
    {
        $this->subTitle = $subTitle;
        return $this;
    }

    public function 设置页面副标题(SchemaNode|string|array $subTitle): static
    {
        return $this->setSubTitle($subTitle);
    }

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

    public function 设置标题提示(string|Remark $提示内容或实例): static
    {
        return $this->setRemark($提示内容或实例);
    }

    public function setAside(SchemaNode|array|string $aside): static
    {
        if(!empty($aside)){
            $this->aside = $aside;
        }
        return $this;
    }

    public function 设置左边栏区域内容(SchemaNode|array|string $内容): static
    {
        return $this->setAside($内容);
    }

    public function setAsideResizor(bool $asideResizor): static
    {
        $this->asideResizor = $asideResizor;
        return $this;
    }

    public function 设置是否可调整左边栏区域(bool $是否可调整): static
    {
        return $this->setAsideResizor($是否可调整);
    }

    public function setAsideSticky(bool $asideSticky): static
    {
        $this->asideSticky = $asideSticky;
        return $this;
    }

    public function 设置是否固定左边栏区域(bool $是否固定): static
    {
        return $this->setAsideSticky($是否固定);
    }

    public function setAsideMinWidth(int $asideMinWidth): static
    {
        $this->asideMinWidth = $asideMinWidth;
        return $this;
    }

    public function 设置边栏区域最小宽度(int $边栏区域最小宽度): static
    {
        return $this->setAsideMinWidth($边栏区域最小宽度);
    }

    public function setAsideMaxWidth(int $asideMaxWidth): static
    {
        $this->asideMaxWidth = $asideMaxWidth;
        return $this;
    }

    public function 设置边栏区域最大宽度(int $边栏区域最大宽度): static
    {
        return $this->setAsideMaxWidth($边栏区域最大宽度);
    }

    public function setToolbar(SchemaNode|string|array $toolbar): static
    {
        if(!empty($toolbar)){
            $this->toolbar = $toolbar;
        }
        return $this;
    }

    public function 设置右上角的内容(SchemaNode|string|array $内容): static
    {
        return $this->setToolbar($内容);
    }

    public function setCssVars(array $cssVars): static
    {
        $this->cssVars = $cssVars;
        return $this;
    }

    public function 设置自定义CSS变量(array $自定义变量): static
    {
        return $this->setCssVars($自定义变量);
    }

    public function setToolbarClassName(ClassName|string $toolbarClassName): static
    {
        $this->toolbarClassName = $toolbarClassName;
        return $this;
    }

    public function 设置右上角内容的类名(ClassName|string $类名): static
    {
        return $this->setToolbarClassName($类名);
    }

    public function setBodyClassName(ClassName|string $bodyClassName): static
    {
        $this->bodyClassName = $bodyClassName;
        return $this;
    }

    public function 设置主体区域的类名(ClassName|string $类名): static
    {
        return $this->setBodyClassName($类名);
    }

    public function setAsideClassName(ClassName|string $asideClassName): static
    {
        $this->asideClassName = $asideClassName;
        return $this;
    }

    public function 设置左边栏区域类名(ClassName|string $类名): static
    {
        return $this->setAsideClassName($类名);
    }

    public function setHeaderClassName(ClassName|string $headerClassName): static
    {
        $this->headerClassName = $headerClassName;
        return $this;
    }

    public function 设置顶部区域类名(ClassName|string $类名): static
    {
        return $this->setHeaderClassName($类名);
    }

    public function setInitApi(Api $initApi): static
    {
        $this->initApi = $initApi;
        return $this;
    }

    public function 设置初始拉取数据接口(Api $接口): static
    {
        return $this->setInitApi($接口);
    }

    public function setInitFetchOn(Condition $initFetchOn): static
    {
        $this->initFetchOn = $initFetchOn;
        return $this;
    }

    public function 设置初始拉取数据的表达式条件(Condition $表达式): static
    {
        return $this->setInitFetchOn($表达式);
    }

    public function setStopAutoRefreshWhen(Condition $stopAutoRefreshWhen): static
    {
        $this->stopAutoRefreshWhen = $stopAutoRefreshWhen;
        return $this;
    }

    public function 设置停止刷新拉取数据条件(Condition $表达式): static
    {
        return $this->setStopAutoRefreshWhen($表达式);
    }

    public function setInterval(int $interval): static
    {
        $this->interval = $interval*1000;
        return $this;
    }

    public function 设置刷新拉取数据的时间(int $刷新时间): static
    {
        return $this->setInterval($刷新时间);
    }

    public function setSilentPolling(bool $silentPolling): static
    {
        $this->silentPolling = $silentPolling;
        return $this;
    }

    public function 设置是否加载刷新动画(bool $是否加载刷新动画): static
    {
        return $this->setSilentPolling($是否加载刷新动画);
    }

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

    public function 创建(): array
    {
        return $this->create();
    }
}