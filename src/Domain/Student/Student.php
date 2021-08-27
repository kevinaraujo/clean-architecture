<?php
namespace Kevin\Architecture\Domain\Student;

use Kevin\Architecture\Domain\Cpf;
use Kevin\Architecture\Domain\Email;

class Student 
{
  private Cpf $cpf;
  private string $name;
  private Email $email;
  private array $phones;

  public static function withCpfNameAndEmail(string $cpf, string $email, string $name): self
  {
    return new Student(
      (new Cpf($cpf)),
      $name, 
      (new Email($email))
    ); 
  }

  public function __construct(Cpf $cpf, string $name, Email $email)
  {
    $this->cpf = $cpf;
    $this->name = $name;
    $this->email = $email;
  }

  public function addPhones(string $ddd, string $number)
  {
    $this->phones[] = new Phone($ddd, $number);
    return $this;
  }
}