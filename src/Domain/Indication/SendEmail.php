<?php
namespace Kevin\Architecture\Domain\Indication;

use Kevin\Architecture\Domain\Student\Student;

interface SendEmail
{
  public function sendTo(Student $indicatedStudent): void;
}