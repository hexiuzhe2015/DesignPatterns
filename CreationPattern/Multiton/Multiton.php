<?php
/**
 * Created by PhpStorm.
 * User: 贺秀哲
 * Date: 2018/10/21
 * Time: 14:35
 */

namespace DesignPatterns\CreationalPattern\Multiton;

final class Multiton //禁止被继承
{
    private static $instances = array();

    public static function getInstance($instancename) //具有延迟初始化（Lazy initialization）特点
    {
        if(!array_key_exists($instancename, self::$instances))
            self::$instances[$instancename] = new self; // 如果这里的$instance数据类型是数组 就是多例模式（Multiton pattern）
        return static::$instances;
    }

    private function  __construct()
    {
    } //不允许外部私有化

    private function __clone()
    {
        // TODO: Implement __clone() method.
    } //防止对象被克隆

    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    } // 防止被反序列化

    public function display()
    {
        echo  $this->a++;
    }
}

$a = Multiton::getInstance(1);

$b = Multiton::getInstance(2);


print_r($b);

