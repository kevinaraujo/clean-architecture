<?php
namespace Kevin\Architecture\Application\Student\EnrollStudent;

use Kevin\Architecture\Domain\Student\Student;
use Kevin\Architecture\Domain\Student\StudentRepository;
use Kevin\Architecture\Infra\Student\StudentRepositoryInMemory;

class EnrollStudent {
  private StudentRepository $studentRepository;

  public function __construct(StudentRepository $studentRepository)
  {
    $this->studentRepository = $studentRepository;
  }
  public function execute(EnrollStudentDTO $studentData): void
  {
    $student = Student::withCpfNameAndEmail($studentData->cpf, $studentData->name, $studentData->email);    
    $this->studentRepository->add($student);
  }
}