<?php
namespace Kevin\Architecture\Application\Student\EnrollStudent;

class EnrollStudentDTO {
  public string $cpf;
  public string $name;
  public string $email;

  public function __construct(string $cpf, string $name, $email)
  {
    $this->cpf = $cpf;
    $this->name = $name;
    $this->email = $email;
  }
}