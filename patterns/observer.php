<?php

class Observer
{
    private $_invoker;

    public function invoke($invoker)
    {
        $this->_invoker = $invoker;
        echo "Observer: I see you!<br />";
    }
}

class TestObject
{
    private $observers = [];

    public function doo()
    {
        echo "TestObject: I do doo!<br />";
        $this->inform();
    }

    private function inform()
    {
        foreach ($this->observers as $observer) {
            $observer->invoke($this);
        }
    }

    public function bind($observer){
        $this->observers[] = $observer;
    }

    public function detach($observer){
        foreach ($this->observers as $key => $observerIn) {
            if ( $observerIn === $observer) {
                unset($this->observers[$key]);
            }
        }

    }
}

$to1 = new TestObject();
$to1->doo();

$observer = new Observer();
$to1->bind($observer);
echo "Object under observation<br />";
$to1->doo();

$to1->detach($observer);
echo "Observation cancelled<br />";
$to1->doo();