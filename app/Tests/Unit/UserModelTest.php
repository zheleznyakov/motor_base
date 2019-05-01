<?php


namespace Application\Tests\Unit;



use Application\Classes\DB;
use Application\Models\UsersModel;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{

    private $db;
    private $user;
    protected function setUp():void
    {
        $this->db = $this->createMock(DB::class);
        $this->db->expects($this->once())
            ->method('query')
            ->with($this->stringContains('SELECT * FROM users WHERE email=:email'))
            ->will($this->returnValue('OK'));
        $this->user = new UsersModel();
        $this->user::setDB($this->db);

    }
    public function test_findByEmail()
    {
        $this->user::findByEmail("mail");
    }
}