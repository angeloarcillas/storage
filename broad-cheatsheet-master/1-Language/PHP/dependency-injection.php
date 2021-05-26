<?php

/**
 * Dependency Injection
 * 
 * Technique whereby one object supplies
 * the dependency of another object
 */
class Foo
{
    public $foo_id;
    public function __construct($id)
    {
        $this->foo_id = $id;
    }
}

class Bar
{
    public $bar_id;
  
    public function __construct($id, Foo $foo)
    {
        $this->bar_id = $id;
        $this->pid = $foo->foo_id; // now you can use Foo class
    }
}

$foo = new Foo(1);
$bar = new Bar(2, $parent);
