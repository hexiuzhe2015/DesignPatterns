<?php
/**
 * Created by PhpStorm.
 * User: 贺秀哲
 * Date: 2018/10/29
 * Time: 14:06
 */

namespace DesignPatterns\StructuralPatterns\ClassAdapter;



interface Target
{

}

class Client implements Target
{
    public function operation()
    {

    }
}

class Adaptee
{
    public function specificOperation()
    {

    }
}

class ClassAdapter  extends Adaptee implements Target
{
    public function operation()
    {
        parent::specificOperation();
    }
}