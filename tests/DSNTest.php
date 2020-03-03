<?php

namespace ExileeD\PDOParseDSN\Tests;

use PHPUnit\Framework\TestCase;
use ExileeD\PDOParseDSN\DSN;
use LogicException;

class DSNTest extends TestCase
{
    public function testMySql()
    {
        $inputString = 'mysql:host=127.0.0.1;port=3306;dbname=test_db;charset=utf8';
        $dsn = new DSN($inputString);

        $this->assertEquals('mysql', $dsn->getProtocol());

        $this->assertEquals('127.0.0.1', $dsn->getHost());
        $this->assertEquals('3306', $dsn->getPort());
        $this->assertEquals('test_db', $dsn->getDatabase());
        $this->assertEquals('utf8', $dsn->getCharset());
        $this->assertEquals($inputString, $dsn->getDsn());
    }

    public function testParamseters()
    {
        $inputString = 'mysql:host=127.0.0.1;port=3306;dbname=test_db;charset=utf8';
        $dsn = new DSN($inputString);

        $params = [
            'host' => '127.0.0.1',
            'port' => 3306,
            'dbname' => 'test_db',
            'charset' => 'utf8',
        ];

        $this->assertIsArray($dsn->getParameters());
        $this->assertEquals($params, $dsn->getParameters());
    }

    public function testMysqlWithoutDatabase()
    {
        $dsn = new DSN('mysql:host=127.0.0.1;port=3306');

        $this->assertEquals('mysql', $dsn->getProtocol());

        $this->assertEquals('127.0.0.1', $dsn->getHost());
        $this->assertEquals('3306', $dsn->getPort());
        $this->assertNull($dsn->getDatabase());
    }

    public function testMysqlWithoutPort()
    {
        $dsn = new DSN('mysql:host=127.0.0.1;dbname=dbname');

        $this->assertEquals('mysql', $dsn->getProtocol());

        $this->assertEquals('127.0.0.1', $dsn->getHost());
        $this->assertEquals('dbname', $dsn->getDatabase());
        $this->assertNull($dsn->getPort());
    }

    public function invalidDsnProvider()
    {
        return [
            ['mysql/127.0.0.1/test_db'],
            ['mysq_l:'],
            ['foobar'],
        ];
    }

    /**
     * @dataProvider invalidDsnProvider
     */
    public function testInvalidDSN($dsnString)
    {
        $this->expectException(LogicException::class);
        new DSN($dsnString);
    }
}
