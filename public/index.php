<?php

use App\Course;
use App\Student;
use App\StudentManager;

spl_autoload_register(function ($className) {
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . str_replace('App', 'app', $className) . '.php';

    if (file_exists($file)) {
        return require_once $file;
    }

    throw new Exception('class not found');
});

set_exception_handler(function($exception) {
    echo "Exception caught: " . $exception->getMessage();
});


$course1 = new Course('arabic');
$course2 = new Course('english');
$course3 = new Course('php');

$std1 = new Student('mohammad abusultan', 'moh@gmail.com', [$course1, $course2, $course3]);
$std2 = new Student('mohammad safadi', 'safadi@gmail.com', [$course1, $course3]);

$manger = new StudentManager();
$manger->add($std1);
$manger->add($std2);

echo '<pre>';
print_r($manger->getStudents());

$manger->edit($std1->id, ['name' => 'ali ramy']);

echo '<pre>';
print_r($manger->getStudents());

$manger->delete($std2->id);

echo '<pre>';
print_r($manger->getStudents());

echo '=============';




