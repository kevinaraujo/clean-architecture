<?php
namespace Kevin\Architecture;

class Phone 
{
  private string $ddd;
  private string $number;

  public function __construct(string $ddd, string $number)
  {
    $this->setDdd($ddd);
    $this->setNumber($number);
  }

  private function setDdd(string $ddd)
  { 
    if (!preg_match('/\d{2}/', $ddd)) {
      throw new \InvalidArgumentException(
        'Invalid ddd.'
      );
    }

    $this->ddd = $ddd;
  }

  private function setNumber(string $number)
  {
    if (!preg_match('/\d{9}/', $number)) {
      throw new \InvalidArgumentException(
        'Invalid number.'
      );
    }
    
    $this->number = $number;
  }

  public function __toString(): string
  {
    return "($this->ddd) $this->number";
  }
}