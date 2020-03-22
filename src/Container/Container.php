<?php
/**
 * Created by PhpStorm.
 * User: miaoyijin
 * Date: 2020/3/22
 * Time: 3:07 PM
 */

class Container
{

    private $identity;

    public $dependents;

    /**
     * @param $class
     * @return mixed
     */
    public function get($class)
    {
        if (isset($this->identity[$class])) {
            return $this->identity[$class];
        } else {
            if (isset($this->dependents[$class])) {
                $realClass = $this->dependents[$class];
            } else {
                $realClass = $class;
            }
            $this->build($realClass);
        }
    }

    /**
     * @return mixed
     */
    public function build($class)
    {
        return Factory::createObject($class);
    }
}