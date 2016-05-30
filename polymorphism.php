<?php

class A
{
    public $test = "testA";
}

class B extends A
{
    public $test = "testB";
}

function testClass(B $testClass){
    var_dump($testClass);
}

$a = new A();
$b = new B();
testClass($a);