<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $user = User::create([
            'email' => 'test1@test.com',
            'username' => 'Thinh',
            'role_id' => 1,
            'fullname' => 'Nguyenvanthinh',
            'password' => bcrypt('123456'),
        ]);
        $this->assertTrue(true);
    }

    public function testUpdate()
    {
        $user = User::create([
            'email' => 'testupdate@test.com',
            'username' => 'Thinh22',
            'role_id' => 1,
            'fullname' => 'Nguyenvanthinh',
            'password' => bcrypt('123456'),
        ]);
        $result = $user->update([
            'email' => 'daupdate@test.com',
        ]);
        $this->assertEquals(true, $result);
    }

    public function testDetele()
    {
        $user = User::create([
            'email' => 'testdelete@test.com',
            'username' => 'testdelete',
            'role_id' => 1,
            'fullname' => 'Nguyenvanthinh',
            'password' => bcrypt('123456'),
        ]);
        $result = $user->delete();
        $this->assertEquals(true, $result);
    }
}
