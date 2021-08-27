<?php
namespace Kevin\Architecture\Domain\Student;

use Kevin\Architecture\Domain\Cpf;

class StudentNotFound extends \DomainException
{ 
  public function __construct(Cpf $cpf)
  {
    parent::__construct("Student with CPF $cpf not found.");
  }
}