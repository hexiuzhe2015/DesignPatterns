<?php
/**
 * Created by PhpStorm.
 * User: 贺秀哲
 * Date: 2018/10/26
 * Time: 10:19
 */

namespace DesignPatterns\StructuralPatterns\ObjectAdapter;


// Adapter Pattern example

interface IFormatIPhone
{
    public function recharge();
    public function useLightning();
}

interface IFormatAndroid
{
    public function recharge();
    public function useMicroUsb();
}

// Adaptee
class IPhone implements IFormatIPhone
{
    private $connectorOk = FALSE;

    public function useLightning()
    {
        $this->connectorOk = TRUE;
        echo "Lightning connected -$\n";
    }

    public function recharge()
    {
        if($this->connectorOk)
        {
            echo "Recharge Started\n";
            echo "Recharge 20%\n";
            echo "Recharge 50%\n";
            echo "Recharge 70%\n";
            echo "Recharge Finished\n";
        }
        else
        {
            echo "Connect Lightning first\n";
        }
    }
}

// Adapter
class IPhoneAdapter implements IFormatAndroid
{
    private $mobile;

    public function __construct(IFormatIPhone $mobile)
    {
        $this->mobile = $mobile;
    }

    public function recharge()
    {
        $this->mobile->recharge();
    }

    public function useMicroUsb()
    {
        echo "MicroUsb connected -> ";
        $this->mobile->useLightning();
    }
}

class Android implements IFormatAndroid
{
    private $connectorOk = FALSE;

    public function useMicroUsb()
    {
        $this->connectorOk = TRUE;
        echo "MicroUsb connected ->\n";
    }

    public function recharge()
    {
        if($this->connectorOk)
        {
            echo "Recharge Started\n";
            echo "Recharge 20%\n";
            echo "Recharge 50%\n";
            echo "Recharge 70%\n";
            echo "Recharge Finished\n";
        }
        else
        {
            echo "Connect MicroUsb first\n";
        }
    }
}

// client
class MicroUsbRecharger
{
    private $phone;
    private $phoneAdapter;

    public function __construct()
    {
        echo "---Recharging iPhone with Generic Recharger---\n";
        $this->phone = new IPhone();
        $this->phoneAdapter = new IPhoneAdapter($this->phone);
        $this->phoneAdapter->useMicroUsb();
        $this->phoneAdapter->recharge();
        echo "---iPhone Ready for use---\n\n";
    }
}

$microUsbRecharger = new MicroUsbRecharger();

class IPhoneRecharger
{
    private $phone;

    public function __construct()
    {
        echo "---Recharging iPhone with iPhone Recharger---\n";
        $this->phone = new IPhone();
        $this->phone->useLightning();
        $this->phone->recharge();
        echo "---iPhone Ready for use---\n\n";
    }
}

$iPhoneRecharger = new IPhoneRecharger();

class AndroidRecharger
{
    private $phone;

    public function __construct()
    {
        echo "---Recharging Android Phone with Generic Recharger---\n";
        $this->phone = new Android();
        $this->phone->useMicroUsb();
        $this->phone->recharge();
        echo "---Phone Ready for use---\n\n";
    }
}

$androidRecharger = new AndroidRecharger();


