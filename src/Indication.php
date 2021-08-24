<?php
namespace Kevin\Architecture;

class Indication 
{
  private Student $indicator;
  private Student $indicated;

  public function __construct(Student $indicator, Student $indicated)
  {
    $this->indicator = $indicator;
    $this->indicated = $indicated;
  }
}