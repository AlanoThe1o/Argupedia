<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class DebateTest extends TestCase
{
    /**
     * A basic test to see if user can access the debate page
     *
     * @return void
     */
    public function test_if_user_can_see_debate_page()
    {
        $response = $this->get('/debate');     
        $response->assertSuccessful();
        $response->assertViewIs('debate.debate');   
    }

    /**
     * A basic test to see if user can access the debate page
     *
     * @return void
     */
    public function test_if_user_can_see_debate_page_recently_created()
    {
        $response = $this->get('/debate2');     
        $response->assertSuccessful();
        $response->assertViewIs('debate.debate');   
    }

    /**
     * A basic test to see if user can access the debate page
     *
     * @return void
     */
    public function test_if_user_can_see_debate_page_most_views()
    {
        $response = $this->get('/debate3');     
        $response->assertSuccessful();
        $response->assertViewIs('debate.debate');   
    }

    public function test_if_user_can_see_my_debates_page()
    {
        $user = User::create(['name'=>'testName', 'password' => password_hash('123', 1),'email'=>'test3@live.com']);
        $response = $this->actingAs($user)->get('/mydebate');
        $response->assertSuccessful();
        $response->assertViewIs('debate.mydebate');   
        $user->delete();
    }
}
