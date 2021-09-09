<?php
namespace Kevin\Architecture\Domain\Student;

interface PasswordEncrypter 
{
  public function encrypt(string $password): string;
  public function validate(string $passwordInText, $passwordEncrypted): bool;
}