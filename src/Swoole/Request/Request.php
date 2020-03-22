<?php
/**
 * Created by PhpStorm.
 * User: miaoyijin
 * Date: 2020/3/17
 * Time: 6:16 PM
 */

namespace Swoole\Request;

class Request
{
    public $server;
    public $frame;
    public $data;
    public $header;
    public $fd;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        //todo
    }

    /**
     * @return mixed
     */
    public function doRequest()
    {
        //todo
        list($route, $params) = $this->resolve();
        return $this->dispatcher($route, $params);
    }

    /**
     *解析路由
     * @return mixed
     */
    public function resolve()
    {
        //todo
    }

    /**
     * 调度执行controller
     * @return mixed
     */
    public function dispatcher()
    {
        return Dispatcher::doDispatcher();
    }
}
