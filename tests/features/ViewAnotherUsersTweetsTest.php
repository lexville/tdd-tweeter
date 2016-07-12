<?php

use App\User;
use App\Tweet;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewAnotherUsersTweetsTest extends TestCase
{
    use DatabaseMigrations;
    
    public function testViewingAnotherUsersTweets()
    {
        $user = factory(User::class)->create(['username' => 'johndoe']);

        $tweet = factory(Tweet::class)->make(['body' => 'My First Tweet']);

        $user->tweets()->save($tweet);

        $this->visit('/johndoe')
            ->see('My First Tweet');
    }
}
