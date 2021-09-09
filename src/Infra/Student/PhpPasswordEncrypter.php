<?php
namespace Kevin\Architecture\Infra\Student;

use Kevin\Architecture\Domain\Student\PasswordEncrypter;

class PhpPasswordEncrypter implements PasswordEncrypter
{
  public function encrypt(string $password): string
  {
    return password_hash($password, PASSWORD_ARGON2ID);
  }

  public function validate(string $passwordInText, $passwordEncrypted): bool
  {
    return password_verify($passwordInText, $passwordEncrypted);
  }
}