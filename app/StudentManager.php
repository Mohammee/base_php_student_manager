<?php

namespace App;

use App\Exception\NotFountException;
use App\Traits\LogTrait;

class StudentManager
{

    use LogTrait;
    private array $students = [];


    public function getById(int $id): Student
    {
        $student = $this->students['student_' . $id] ?? null;

        if (!$student) {
            throw new NotFountException();
        }

        return $student;
    }

    public function add(Student $student)
    {
        $this->writeMessage('Manager add new student with name => ' . $student->name);
        $this->students['student_' . $student->getId()] = $student;
    }

    public function edit(int $id, array $data): Student
    {
        $student = $this->getById($id);

        $student->name = $data['name'] ?? $student->name;
        $student->email = $data['email'] ?? $student->email;
        $student->coures = $data['courses'] ?? $student->courses;

        $this->writeMessage('Manager edit student has name => ' . $student->name);

        return $student;
    }

    public function delete(int $id)
    {
        if (!array_key_exists('student_' . $id, $this->students)) {
            throw new NotFountException();
        }

        $student = $this->students['student_' . $id];

        unset($this->students['student_' . $id]);
        $this->writeMessage('Manager delete  student has name => ' . $student->name);
    }

    public function getStudents(): array
    {
        return $this->students;
    }


}