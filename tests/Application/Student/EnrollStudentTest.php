<?php
namespace Kevin\Architecture\Tests\Application\Student;

use Kevin\Architecture\Application\Student\EnrollStudent\EnrollStudent;
use Kevin\Architecture\Application\Student\EnrollStudent\EnrollStudentDTO;
use Kevin\Architecture\Domain\Cpf;
use Kevin\Architecture\Infra\Student\StudentRepositoryInMemory;
use PHPUnit\Framework\TestCase;

class EnrollStudentTest extends TestCase {
  public function testStudentMustBeAddedToRepository()
  {
    $enrollStudentDTO = new EnrollStudentDTO(
      '123.456.789-10',
      'Teste',
      'email@example.com'
    );

    $studentRepositoryInMemory = new StudentRepositoryInMemory();
    
    $useCase = new EnrollStudent($studentRepositoryInMemory);
    $useCase->execute($enrollStudentDTO);

    $student = $studentRepositoryInMemory->getByCpf((new Cpf('123.456.789-10')));
    $this->assertSame('123.456.789-10', (string) $student->cpf());
    $this->assertSame('Teste', (string) $student->name());
    $this->assertSame('email@example.com', (string) $student->email());
    $this->assertEmpty($student->phones());

  }
}