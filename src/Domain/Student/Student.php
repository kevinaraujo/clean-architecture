<?php
namespace Kevin\Architecture\Domain\Student;

use Kevin\Architecture\Domain\Cpf;

class Student 
{
  private Cpf $cpf;
  private string $name;
  private Email $email;
  private array $phones;

  public static function withCpfNameAndEmail(string $cpf, string $name, string $email): self
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
    $this->phones = [];
  }

  public function addPhones(string $ddd, string $number)
  { 
    $this->phones[] = new Phone($ddd, $number);
    return $this;
  }

  public function cpf(): string
  {
    return $this->cpf;
  }

  public function name(): string
  {
    return $this->name;
  }

  public function email(): string
  {
    return $this->email;
  }

  /** @return phones[] */
  public function phones(): array
  {
    return $this->phones;
  }
}