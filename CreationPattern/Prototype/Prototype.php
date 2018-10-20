<?php
/**
 * Created by PhpStorm.
 * User: 贺秀哲
 * Date: 2018/10/20
 * Time: 8:42
 */

namespace DesignPatterns\CreationalPattern\Prototype;

abstract class Prototype
{
    public function display(){} //抽象类里的抽象方法必须在子类中实现但是普通方法就不用实现，切记
    public function __clone()
    {
        // TODO: Implement __clone() method.
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