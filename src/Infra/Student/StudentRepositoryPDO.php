<?php
namespace Kevin\Architecture\Infra\Student;

use Kevin\Architecture\Domain\Cpf;
use Kevin\Architecture\Domain\Student\Student;
use Kevin\Architecture\Domain\Student\StudentNotFound;
use Kevin\Architecture\Domain\Student\StudentRepository;

class StudentRepositoryPDO implements StudentRepository
{
  private \PDO $connection;

  public function __construct(\PDO $connection)
  {
    $this->connection = $connection;
  }

  public function add(Student $student): void
  {
    $sql = 'INSERT INTO student VALUES (:cpf, :name, :email)';
    $stmt = $this->connection->prepare($sql);
    $stmt->bindValue('cpf', $student->cpf());
    $stmt->bindValue('name', $student->name());
    $stmt->bindValue('email', $student->email());
    $stmt->execute();

    $sql = 'INSERT INTO phones VALUES (:ddd, :number, $cpf)';
    $stmt = $this->connection->prepare($sql);
    $stmt->bindValue('cpf', $student->cpf());

    foreach($student->phones() as $phone) {     
      $stmt->bindValue('ddd', $phone->ddd());
      $stmt->bindValue('number', $phone->number());
      $stmt->execute();
    }
  }

  public function getByCpf(Cpf $cpf): Student
  {
    $sql = 'SELECT cpf, name, email, ddd, number 
            FROM students
            LEFT JOIN phones ON phones.cpf = students.cpf
            WHERE student.cpf = ?';

    $stmt = $this->connection->prepare($sql);
    $stmt->bindValue(1, (string) $cpf);
    $stmt->execute();

    $studentData = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    if (count($studentData) === 0) {
      throw new StudentNotFound($cpf);
    }

    return $this->mapStudent($studentData);
  }

  private function mapStudent(array $studentData): Student
  {
    $firstLine = $studentData[0];

    $student = Student::withCpfNameAndEmail(
      $firstLine['cpf'],
      $firstLine['name'],
      $firstLine['email']
    );

    $phones = array_filter($studentData, function ($line) {
      return $line['ddd'] !== null && $line['number'] !== null; 
    });

    foreach($phones as $phone) {
      $student->addPhones($phone['ddd'], $phone['number']);
    }
  }

  public function getAll(): array
  {
    $sql = 'SELECT cpf, name, email, ddd, number 
            FROM students
            LEFT JOIN phones ON phones.cpf = students.cpf';

    $stmt = $this->connection->query($sql);

    $studentData = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    $students = [];

    foreach($studentData as $student) {
      if (!array_key_exists($student['cpf'], $students)) {
        $students[$student['cpf']] = Student::withCpfNameAndEmail(
          $student['cpf'],
          $student['email'],
          $student['name']
        );
      }

      $students[$student['cpf']]->addPhones(
        $student['ddd'],
        $student['number']
      );
    }

    return array_values($students);
  }
}