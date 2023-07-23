<?php

// Caso queira fazer o teste unitário usando o PHPUnit

use PHPUnit\Framework\TestCase;

class ValidacaoColchetesTest extends TestCase
{
    public function testSequenciasValidas()
    {
        $this->assertTrue(validarColchetes("(){}[]"));
        $this->assertTrue(validarColchetes("[{()}](){}"));
    }

    public function testSequenciasInvalidas()
    {
        $this->assertFalse(validarColchetes("[]{()"));
        $this->assertFalse(validarColchetes("[{)]"));
    }
}

// Comando para realizar o teste unitário com o PHPUnit:
// vendor/bin/phpunit tests/ValidacaoColchetesTest.php
