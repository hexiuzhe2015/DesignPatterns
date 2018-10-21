<?php
/**
 * Created by PhpStorm.
 * User: 贺秀哲
 * Date: 2018/10/19
 * Time: 10:09
 */

namespace DesignPatterns\CreationalPattern\Builder;

interface Builder
{
    function buildPartA();
    function buildPartB();
    function buildPartC();
    function getResult();
}

class Director
{
    private $builder;
    public function __construct(Builder $builder) // 依赖注入模式(Dependency Injection)的实现
    {
        $this->builder = $builder;
    }
    public function construct()
    {
        $this->builder->buildPartA();
        $this->builder->buildPartB();
        $this->builder->buildPartC();
    }
}

class ConcreteBuilder implements Builder
{
    public $partA, $partB, $partC;
    public function buildPartA()
    {
        // TODO: Implement buildPartA() method.
        echo 'partA is builded';
    }
    public function buildPartB()
    {
        // TODO: Implement buildPartB() method.
        echo 'partB is builded';
    }
    public function buildPartC()
    {
        // TODO: Implement buildPartC() method.
        echo 'partC is builded';
    }
    public function getResult()
    {
        // TODO: Implement getResult() method.
        echo 'return product';
        return 1;
    }
}

$builder = new ConcreteBuilder();
$director = new Director($builder);

$director->construct();
$product = $builder->getResult();