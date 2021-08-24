<?php
namespace Kevin\Architecture;

class Cpf 
{
  private string $number;

  public function __construct(string $number)
  {
    $this->setNumber($number);
  }

  public function setNumber(string $number): void
  {
    $options = [
      'options' => [
        'regexp' => '/\d{3}\.\d{3}\-\d{2}/'
      ]
    ];

    if (filter_var($number, FILTER_VALIDATE_REGEXP, $options) === false) {
      throw new \InvalidArgumentException(
        'Invalid cpf format.'
      );
    }

    $this->number = $number;
  }

  public function __toString(): string
  {
    return $this->number;
  }
}