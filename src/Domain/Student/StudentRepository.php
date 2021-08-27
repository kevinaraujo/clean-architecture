<?php
namespace Kevin\Architecture\Domain\Student;

use Kevin\Architecture\Domain\Cpf;

interface StudentRepository
{
  public function add(Student $student): void;
  public function getByCpf(Cpf $cpf): Student;
  public function getAll(): array;
}