<?php
/**
 * Created by PhpStorm.
 * User: 贺秀哲
 * Date: 2018/10/20
 * Time: 8:42
 */

namespace DesignPatterns\CreationalPatterns\Prototype;

abstract class Prototype
{
    public function display(){} //抽象类里的抽象方法必须在子类中实现但是普通方法就不用实现，切记
    public function __clone()
    {
        // TODO: Implement __clone() method.
        // clone $this; // 当调用clone方法时会导致500错误，但其他页面均正常
    }
}

class ConcretePrototype1 extends Prototype
{

}

class ConcretePrototype2 extends Prototype
{

}

$cp1 = new ConcretePrototype1();

$cp2 = clone $cp1;

print_r($cp1);
print_r($cp2);