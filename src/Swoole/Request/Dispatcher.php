<?php
/**
 * Created by PhpStorm.
 * User: miaoyijin
 * Date: 2020/3/17
 * Time: 6:16 PM
 */

namespace Swoole\Request;

class Dispatcher
{

    /**
     * @param array $params params
     * @return mixed
     */
    public function doDispatcher($params)
    {
        //todo
        list($controller, $action, $params) = $params;
        return $this->runAction();
    }

    /**
     * @return mixed
     */
    public function runAction()
    {
        return $result ?? [];
    }
}
