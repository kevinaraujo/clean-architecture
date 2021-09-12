<?php

use Kevin\Architecture\Domain\Student\Student;
use Kevin\Architecture\Infra\Student\StudentRepositoryInMemory;

require 'vendor/autoload.php';

$cpf = $argv[1];
$name = $argv[2];
$email = $argv[3]; 
$ddd = $argv[4];
$number = $argv[5];

$student = Student::withCpfNameAndEmail(
  $cpf,
  $name,
  $email
);
$student->addPhones($ddd, $number);

$repository = new StudentRepositoryInMemory();
$repository->add($student);