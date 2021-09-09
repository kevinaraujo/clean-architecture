<?php
namespace Kevin\Architecture\Infra\Student;

use Kevin\Architecture\Domain\Student\PasswordEncrypter;

class Md5PasswordEncrypter implements PasswordEncrypter
{
  public function encrypt(string $password): string
  {
    return md5($password);
  }

  public function validate(string $passwordInText, $passwordEncrypted): bool
  {
    return md5($passwordInText) === $passwordEncrypted;
  }
}