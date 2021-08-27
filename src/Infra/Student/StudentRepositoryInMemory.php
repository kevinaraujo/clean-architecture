<?php
namespace Kevin\Architecture\Infra\Student;

use Kevin\Architecture\Domain\Cpf;
use Kevin\Architecture\Domain\Student\Student;
use Kevin\Architecture\Domain\Student\StudentNotFound;
use Kevin\Architecture\Domain\Student\StudentRepository;

class StudentRepositoryInMemory implements StudentRepository
{
  private array $students = [];

  public function add(Student $student): void
  {
    $this->students[] = $student;
  }

  public function getByCpf(Cpf $cpf): Student
  {
    $filteredStudents = array_filter(
      $this->students, 
      fn (Student $student) => $student->cpf() == $cpf
    );

    if (count($filteredStudents) === 0) {
      throw new StudentNotFound($cpf);
    }
    
    return $filteredStudents[0];
  }

  public function getAll(): array
  {
    return $this->students;
  }
}