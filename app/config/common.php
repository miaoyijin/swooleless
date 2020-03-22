<?php
/**
 * Created by PhpStorm.
 * User: miaoyijin
 * Date: 2020/3/15
 * Time: 8:21 PM
 */

return Libs\Common\Config::set([
    'server' => [
        'max_request' => 1000,
        'worker_num' => 32,
        'reactor_num' => 4,
        'daemonize' => 1,
        'max_connection' => 100,
        'backlog' => 128,
        'reload_async' => true,
    ]
]);
