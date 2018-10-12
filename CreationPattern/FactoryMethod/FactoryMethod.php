<?php
/**
 * Created by PhpStorm.
 * User: 贺秀哲
 * Date: 2018/10/12
 * Time: 8:31
 */

namespace DesignPatterns\CreationalPattern\FactoryMethod;

/* Factory and car interfaces */

interface CarFactory
{
    public function makeCar();
}

interface Car
{
    public function getType();
}

class Sedan implements Car
{
    public function getType()
    {
        return 'Sedan';
    }
}

/* Concrete implementations of the factory and car */

class SedanFactory implements CarFactory
{
    public function makeCar()
    {
        return new Sedan();
    }
}

/* Client */

$factory = new SedanFactory();
$car = $factory->makeCar();
print $car->getType();

