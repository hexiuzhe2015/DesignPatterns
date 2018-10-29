<?php
/**
 * Created by PhpStorm.
 * User: 贺秀哲
 * Date: 2018/10/29
 * Time: 14:42
 */

namespace DesignPatterns\StructuralPatterns\Bridge;

interface DrawingAPI {
    function drawCircle($x, $y, $radius);
}

class DrawingAPI1 implements DrawingAPI {
    public function drawCircle($x, $y, $radius) {
        echo "API1.circle at $x:$y radius $radius.\n";
    }
}

class DrawingAPI2 implements DrawingAPI {
    public function drawCircle($x, $y, $radius) {
        echo "API2.circle at $x:$y radius $radius.\n";
    }
}

abstract class Shape {
    protected $drawingAPI;

    public abstract function draw();
    public abstract function resizeByPercentage($pct);

    protected function __construct(DrawingAPI $drawingAPI) {
        $this->drawingAPI = $drawingAPI;
    }
}

class CircleShape extends Shape {
    private $x;
    private $y;
    private $radius;

    public function __construct($x, $y, $radius, DrawingAPI $drawingAPI) {
        parent::__construct($drawingAPI);
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }

    public function draw() {
        $this->drawingAPI->drawCircle($this->x, $this->y, $this->radius);
    }

    public function resizeByPercentage($pct) {
        $this->radius *= $pct;
    }
}

class Tester {
    public static function main()  {
        $shapes = array(
            new CircleShape(1, 3, 7,  new DrawingAPI1()),
            new CircleShape(5, 7, 11, new DrawingAPI2()),
        );

        foreach ($shapes as $shape) {
            $shape->resizeByPercentage(2.5);
            $shape->draw();
        }
    }
}

Tester::main();