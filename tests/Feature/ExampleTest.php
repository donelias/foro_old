<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseTransactions;


    public function testBasicTest()
    {


        $user = factory(\App\User::class)->create([
            'name' => 'Hector Galindez',
            'email' => 'hectorgalindez02@gmail.com',
        ]);

        $this->actingAs($user, 'api')
            ->get('/api/user')
            ->assertStatus(200)
            ->assertSee('Hector Galindez')
            ->assertSee('hectorgalindez02@gmail.com');
    }
}
