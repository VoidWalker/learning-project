<?php
class myIterator implements Iterator {
    private $array = array(
        "firstelement",
        "secondelement",
        "lastelement",
    );

    public function __construct() {
        $this->position = 0;
    }

    public function getIterator(){
        return new ArrayIterator($this->array);
    }

}

$it = new myIterator;

foreach($it as $key => $value) {
    var_dump($key, $value);
    echo "\n";
}