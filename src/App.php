<?php
/**
 * Created by PhpStorm.
 * User: miaoyijin
 * Date: 2020/3/22
 * Time: 1:44 PM
 */

/**
 * Container 调用factory生产对象
 * Class App
 */
class App
{
    public $server;

    public $container;

    public $request;

    public $response;

    /**
     * @var App
     */
    public static $instance;

    /**
     * @return App
     */
    public static function getInstance()
    {
        return self::$instance = new self();
    }

    /**
     * App constructor.
     */
    private function __construct()
    {
        $this->server = new \Swoole\WsServer();
        $this->container = new Container();
        $this->server->run();
    }

    /**
     * @return mixed
     */
    public function handleRequest()
    {
        $result = $this->request->doRequest();
        $this->response->setResponse($result);
        $this->response->end();
    }

    /**
     * @return mixed
     */
    public static function createObject()
    {
        return self::$instance->container->createObject();
    }
}
