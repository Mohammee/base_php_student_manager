<?php
namespace App;

class Course
{

    private readonly int $id;
    private static int $counter = 0;

    public function __construct(private string $name)
    {
        $this->id = self::$counter++;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
}