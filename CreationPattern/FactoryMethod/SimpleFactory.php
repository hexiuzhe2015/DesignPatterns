<?php
/**
 * Created by PhpStorm.
 * User: 贺秀哲
 * Date: 2018/10/12
 * Time: 19:38
 */

//工厂模式的变种 variant
namespace DesignPatterns\CreationalPattern\FactoryMethod;

class Button{}
class WinButton extends Button{}
class MacButton extends Button{}

interface ButtonFactory
{
    public function createButton($type);
}

class MyButtonFactory implements ButtonFactory
{
    public function createButton($type)
    {
        // TODO: Implement createButton() method.
        switch ($type) {
            case 'Win' :
                return new WinButton();
            case 'Mac' :
                return new MacButton();
        }
    }
}

$button_obj = new MyButtonFactory();
var_dump($button_obj->createButton('Mac'));
var_dump($button_obj->createButton('Win'));