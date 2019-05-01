<?php


namespace Application\Tests\Unit;

use Application\Classes\DB;
use Application\Models\AbstractModel;
use PHPUnit\Framework\TestCase;



class AbstractModelTest extends TestCase
{
    private $db_stub;
    private $abstract_model;

    protected function setUp():void
    {
        //создадим заглушку для базы данных
        $this->db_stub = $this->createMock(DB::class);

        $this->db_stub->expects($this->once())
            ->method('query')
            ->with($this->stringContains('SELECT * FROM'))
            ->will($this->returnValue('OK'));

        //$db_stub->method('query')->willReturn('OK');

        $this->abstract_model = $this
            ->getMockBuilder(AbstractModel::class)
            ->getMockForAbstractClass();
        $this->abstract_model::setDB($this->db_stub);
    }
    public function test_getAll()
    {
        $result = $this->abstract_model::getAll();
        $this->assertSame('OK',$result);
    }

    public function test_getOneByPk()
    {
        $this->abstract_model::getOneByPk(1);
    }
}