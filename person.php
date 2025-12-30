<?php

require_once "connection.php";
abstract class Person{
    protected int $id;
    protected string $name;
    protected string $nationnality;
    protected string $email;

    public function __construct(int $id, string $name, string $nationnality, string $email)
    {
    }
}

?>