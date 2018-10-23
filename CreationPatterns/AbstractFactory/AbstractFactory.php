<?php
/**
 * Created by PhpStorm.
 * User: 贺秀哲
 * Date: 2018/10/17
 * Time: 22:25
 */

namespace DesignPatterns\CreationalPatterns\AbstractFactory;

class Button{}
class Border{}

class WinButton extends Button{}
class WinBorder extends Border{}
class MacButton extends Button{}
class MacBorder extends Border{}

abstract class AbstractFactory
{
    abstract public function CreateButton();
    abstract public function CreateBorder();
}

class WinFactory extends AbstractFactory
{

    public function CreateButton()
    {
        // TODO: Implement CreateButton() method.
        return new WinButton();
    }

    public function CreateBorder()
    {
        // TODO: Implement CreateBorder() method.
        return new WinBorder();
    }
}

class MacFactory extends AbstractFactory
{

    public function CreateButton()
    {
        // TODO: Implement CreateButton() method.
        return new MacButton();
    }

    public function CreateBorder()
    {
        // TODO: Implement CreateBorder() method.
        return new MacBorder();
    }
}