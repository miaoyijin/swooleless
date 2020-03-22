<?php
/**
 * Created by PhpStorm.
 * User: miaoyijin
 * Date: 2020/3/17
 * Time: 7:36 PM
 */


class JsonProtocol
{
    private $header;
    private $data;

    /**
     * 序列化
     * @param arrat $data data ;
     * @return mixed
     */
    public static function pack($data)
    {
        return json_encode($data);
    }

    /**
     * @param array $data data
     * @return mixed
     */
    public function unPack($data)
    {
        $data = json_decode($data, true);
        $this->data = $data['data'];
        $this->header = $data['header'];
    }
}