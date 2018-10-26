<?php
/**
 * Created by PhpStorm.
 * User: 贺秀哲
 * Date: 2018/10/26
 * Time: 10:19
 */

namespace DesignPatterns\StructuralPatterns\ObjectAdapter;

interface Phone
{
    public function recharge();
}

interface PowerBank{}

class IphonePowerBank implements PowerBank
{
    public function usbToLightning()
    {
        return 'lightning';
    }
}

class AndroidPowerBank implements PowerBank
{
    public function usbToTypeC()
    {
        return 'type-c';
    }
}

class Iphone implements Phone
{
    public $socket;
    public function __construct(IphonePowerBank $bank)
    {
        $this->socket = $bank;
    }


    public function recharge()
    {
        return $this->socket->usbToLightning();
    }
}

class AndroidPhone implements Phone
{
    public $socket;
    public function __construct(AndroidPowerBank $bank)
    {
        $this->socket = $bank;
    }

    public function recharge()
    {
        // TODO: Implement socket() method.
        return $this->socket->usbToTypeC();
    }
}

class Adapter extends IphonePowerBank
{
    public $in;
    public $out;
    public function __construct(AndroidPowerBank $bank)
    {
        $this->in = $bank;
    }
    public function typeCToLightning()
    {
        $this->out = $this->in->usbToTypeC();
        return $this->out;
    }
}

$bank = new AndroidPowerBank();
$adapter = new Adapter($bank);
$recharge = new AndroidPhone($bank);

$recharge = new Iphone($adapter);
echo $recharge->recharge();
//print_r($recharge);