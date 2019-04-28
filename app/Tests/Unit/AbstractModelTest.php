<?php


namespace Application\Tests\Unit;

use Application\Classes\DB;
use Application\Models\AbstractModel;
use PHPUnit\Framework\TestCase;



class AbstractModelTest extends TestCase
{
    public function test_getAll()
    {
        //создадим заглушку для базы данных
        $db_stub = $this->createMock(DB::class);

        $db_stub->method('query')->willReturn('OK');

        $abstract_model = $this
            ->getMockBuilder(AbstractModel::class)
            ->getMockForAbstractClass();
        $abstract_model::setDB($db_stub);
        $result = $abstract_model::getAll();

        $this->assertSame('OK',$result);
    }
}