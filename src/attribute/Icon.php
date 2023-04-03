<?php

namespace Aimanong\Amischs\attribute;

class Icon
{
    private string $icon = '';
    public function __construct(string $iconName)
    {
        $this->icon = self::getIcon($iconName);
    }

    public function __toString()
    {
        return $this->icon;
    }

    public static function getIcon(string $iconName): string
    {
         return match ($iconName){
            '问号','question' => 'fa fa-question-circle'
        };
    }

    public static function 获取图标(string $图标): string
    {
        return self::getIcon($图标);
    }
}