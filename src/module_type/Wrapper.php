<?php

namespace Aimanong\Amischs\module_type;

use Aimanong\Amischs\Module;

class Wrapper extends Module
{
    public string $type = 'wrapper';
    protected string $size = ''; //边框尺寸 xs sm md lg
    protected array $style = []; //自定义样式

    /**
     * @return array
     */
    public function create(): array
    {
        // TODO: Implement create() method.
    }

    /**
     * @return array
     */
    public function 创建(): array
    {
        // TODO: Implement 创建() method.
    }
}