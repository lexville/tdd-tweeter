<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function testUserCanBeFoundByUsername()
    {
        $createdUser = factory(User::class)->create(['username' => 'janedoe']);

        $foundUser = User::findByUsername('janedoe');

        $this->assertEquals($createdUser->id, $foundUser->id);

        $this->assertEquals($createdUser->username, $foundUser->username);
    }
}
