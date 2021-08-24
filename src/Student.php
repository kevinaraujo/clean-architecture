<?php
namespace Kevin\Architecture;

class Student 
{
  private Cpf $cpf;
  private string $name;
  private Email $email;
  private array $phones;

  public function __construct(Cpf $cpf, string $name, Email $email)
  {
    $this->cpf = $cpf;
    $this->name = $name;
    $this->email = $email;
  }

  public function addPhones(string $ddd, string $number)
  {
    $this->phones[] = new Phone($ddd, $number);
  }
}