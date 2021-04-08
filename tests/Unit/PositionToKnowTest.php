<?php


namespace Tests\Unit;

use Tests\TestCase;
use App\Actions\Fortify;
use Auth;
use App\Models\User;
use App\Models\Debate;
use App\Models\Argument;
use App\Models\Scheme; 
use App\Models\PositionToKnow;

class PositionToKnowTest extends TestCase
{

    /**
     *  Test to check if a user can see the form to create a position 2 know argument. 
     *
     * @return void
     */
    public function test_guest_cant_see_create_form()
    {
        $response = $this->get('/postoknow');     
        $response->assertRedirect('login');   
    }

    /**
     *  Test to check if a user can see the form to create a position 2 know argument. 
     *
     * @return void
     */
    public function test_logged_in_user_can_see_create_form()
    {
        $user = User::create(['name'=>'testName', 'password' => password_hash('123', 1),'email'=>'test3@live.com']);
        $response = $this->actingAs($user)->get('/postoknow');        
        $response->assertSuccessful();
        $response->assertViewIs('postoknow.create');
        $user->delete();
    }

    /**
     * Test to make sure user can create an argument using this scheme
     * 
     */
    public function test_creating_argument_using_scheme()
    {
        $scheme = new Scheme(['scheme_name' => 'Position To Know']);
        $scheme->save();
        $PositionToKnow = PositionToKnow::create(['person' => 'person', 'proposition' => 'proposition', 'schemeId' => $scheme->getkey(), 'state' => 0]);
        $this->assertDatabaseHas('Position_to_knows',[
            'person'=>'person',
            'proposition'=>'proposition',
            'state'=>0,
            'schemeId'=> $scheme->getkey()
        ]);
        $scheme->delete();
        $PositionToKnow->delete();
    }
}
