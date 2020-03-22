<?php
/**
 * Created by PhpStorm.
 * User: miaoyijin
 * Date: 2020/3/15
 * Time: 2:44 PM
 */

namespace Swoole;

use Common\Config;

/**
 * Class Server
 * @package Swoole
 */

abstract class Server
{

    /**
     * @var Server;
     */
    public $swooleServer;


    /**
     * 启动服务
     * @return mixed
     */
    public function run()
    {
        $this->initConfig();
        $this->event();
        $this->start();
    }

    /**
     * 注册监听事件
     * @return mixed
     */
    public function event()
    {
        $methods = get_class_methods($this);
        foreach ($methods as $method) {
            if (strtolower(substr($method, 0, 2)) == 'on') {
                $event = substr($method, 0, 2);
                $this->swooleServer->on($event, [$this, $method]);
            }
        }
    }

    /**
     * onStart回掉函数
     * @return mixed
     */
    public function onMasterStart()
    {
        swoole_set_process_name('swoole-master');
    }

    /**
     * onWorkerStart回掉函数
     * @return mixed
     */
    public function onWorkerStart()
    {
        swoole_set_process_name('swoole-worker');
    }

    /**
     * ManagerStart回掉函数
     * @return mixed
     */
    public function onManagerStart()
    {
        swoole_set_process_name('swoole-manger');
    }

    /**
     * 启动服务
     * @return mixed
     */
    protected function start()
    {
        $this->swooleServer->start();
    }


    /**
     * 设置服务配置
     * @return mixed
     */
    protected function initConfig()
    {
        $config = Config::getConfig('server');
        $serverConfig = $this->parseServerConfig($config);
        $this->swooleServer->set($serverConfig);
    }

    /**
     * @param array $config config
     * @return mixed
     */
    protected function parseServerConfig($config)
    {
        $default = [
            'daemonize' => 0,
            'max_connection' => 100000,//10W
            'max_request' => 1000,
            'worker_num' => 128,
        ];
        return array_merge($default, $config);
    }
}
