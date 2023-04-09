<?php

namespace Aimanong\Amischs\module_type;

use Aimanong\Amischs\Module;

class Divider extends Module
{

    public function create(): array
    {
        return [
            'type' => 'divider'
        ];
    }
}