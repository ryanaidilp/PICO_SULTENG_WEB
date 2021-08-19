<?php

declare(strict_types=1);

return [

    'enabled' => env('HOOKS_ENABLED', true),

    'add-route'            => true,
    'add-hook-menu-item'   => true,
    'add-hook-permissions' => true,
    'publish-vendor-files' => true,

];
