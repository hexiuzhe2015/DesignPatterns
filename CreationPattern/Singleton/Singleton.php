<?php
/**
 * Created by PhpStorm.
 * User: 贺秀哲
 * Date: 2018/10/20
 * Time: 9:28
 */
namespace DesignPatterns\CreationalPattern\Singleton;

final class Singleton //禁止被继承
{
    private static $instance;

    public static function getInstance()
    {
        if(null === static::$instance){
            return static::$instance = new static;
        }
        return static::$instance;
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
}