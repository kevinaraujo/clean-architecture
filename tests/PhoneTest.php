<?php

use Kevin\Architecture\Phone;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
  public function testInvalidDddThrowsException()
  {
    $this->expectException(\InvalidArgumentException::class);
    $this->expectExceptionMessage('Invalid ddd.');

    $phone = new Phone('1', '123456789');
  }

  public function testInvalidNumberThrowsException()
  {
    $this->expectException(\InvalidArgumentException::class);
    $this->expectExceptionMessage('Invalid number.');

    $phone = new Phone('11', '12345678');
  }

  public function testValidPhone()
  {    
    $phone = new Phone('11', '123456789');
    $this->assertSame('(11) 123456789', (string) $phone);
  }
}