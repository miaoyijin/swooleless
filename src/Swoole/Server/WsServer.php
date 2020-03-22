<?php
/**
 * Created by PhpStorm.
 * User: miaoyijin
 * Date: 2020/3/15
 * Time: 2:44 PM
 */
namespace Swoole;

use App;
use Swoole\Request\Request;

/**
 * Class WsServer
 * @package Swoole
 */
class WsServer extends Server
{

    /**
     * WebSocketServer constructor.
     * @param string $ip ip
     * @param integer $port port
     */
    public function __construct($ip, $port = null)
    {
        $this->swooleServer = new \Swoole\WebSocket\Server($ip ?? "0.0.0.0", $port ?? 80);
    }

    /**
     * @param mixed ...$parmes params
     * @return mixed
     */
    public function onMessage(...$parmes)
    {
        App::$instance->handleRequest();
    }
}
