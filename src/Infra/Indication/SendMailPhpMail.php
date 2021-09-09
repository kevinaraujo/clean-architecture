<?php
namespace Kevin\Architecture\Infra\Indication;

use Kevin\Architecture\Domain\Indication\SendEmail;
use Kevin\Architecture\Domain\Student\Student;

class SendMailPhpMail implements SendEmail
{
  public function sendTo(Student $indicatedStudent): void
  {
    mail(
      $indicatedStudent->email, 
      "Student $indicatedStudent->name indicated.",
      "Student $indicatedStudent->name indicated."
    );
  }
}