<?php
/**
 * Created by PhpStorm.
 * User: 贺秀哲
 * Date: 2018/10/21
 * Time: 15:47
 */

namespace DesignPatterns\CreationalPattern\ObjectPool;

interface KernelContract
{

}

class Kernel implements KernelContract
{
    public function __construct(Application $app, Router $router)
    {

    }
}

class Core extends Kernel
{

}


interface ContainerContract
{

}

class Container implements ContainerContract
{
    protected static $instance;
    public static function setInstance(ContainerContract $container = null)
    {
        return static::$instance = $container;
    }
}

class Application extends Container
{
    public function __construct()
    {
        static::setInstance($this);
    }

    public function bind($abstract, $concrete = null, $shared = false)
    {
        if (is_null($concrete)) {
            $concrete = $abstract;
        }

        if (! $concrete instanceof Closure) {
            $concrete = $this->getClosure($abstract, $concrete);
        }

        $this->bindings[$abstract] = compact('concrete', 'shared');

    }

    protected function getClosure($abstract, $concrete)
    {
        return function ($container, $parameters = []) use ($abstract, $concrete) {
            if ($abstract == $concrete) {
                return $container->build($concrete);
            }
            return $container->make($concrete, $parameters);
        };
    }
}

$app = new Application();
$tmp = $app->bind(Kernel::class, Core::class);

print_r($app);