<?php

namespace App;

class Student
{

    private readonly int $id;
    private static int $counter = 0;

    /**
     * @param string $name
     * @param string $email
     * @param Course[] $courses
     */
    public function __construct(private string $name, private string $email, private array $courses)
    {
        $this->id = $this::$counter++;
    }

   public function __get(string $name)
   {
       if(property_exists($this, $name)){
           return $this->{$name};
       }

       return null;
   }

   public function __set(string $name, $value): void
   {
      if(property_exists($this, $name)){
          $this->{$name} = $value;
      }
   }

   public function __call(string $name, array $arguments)
   {
       $name = str_replace('get', '', strtolower($name));

       if(property_exists($this, $name)){
           return $this->{$name};
       }
   }

    public function __destruct()
   {
       echo __METHOD__;
   }

}