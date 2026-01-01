<?php

require_once "connection.php";
abstract class Person{
    protected string $name;
    protected string $nationnality;

    public function __construct(string $name, string $nationnality)
    {

    }

    public function _construct($name,$nationnality){
        $this->name = $name;
        $this->nationnality = $nationnality;
    }
}

?>