<?php
/**
 * Created by PhpStorm.
 * User: miaoyijin
 * Date: 2020/3/16
 * Time: 10:24 AM
 */

namespace Common;

class Config
{

    public static $config;

    /**
     * 设置配置
     * @param array $array 数组配置
     * @return mixed
     */
    public static function set(array $array)
    {
        self::$config = $array;
    }


    /**
     * 获取服务配置项
     * @param string $key key
     * @return mixed
     */
    public static function getConfig($key)
    {
        return self::$config[$key];
    }
}
