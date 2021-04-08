<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Actions\Fortify;
use Auth;
use App\Models\User;
use App\Models\Debate;
use App\Models\Argument;
use App\Models\Scheme; 
use App\Models\Action;

class ActionTest extends TestCase
{
    /**
     *  Test to check if a user can see the form to create a action argument. 
     *
     * @return void
     */
    public function test_guest_cant_see_create_form()
    {
        $response = $this->get('/action');     
        $response->assertRedirect('login');   
    }
    /**
     *  Test to check if a user can see the form to create a action argument. 
     *
     * @return void
     */
    public function test_user_can_see_create_form()
    {
        $user = User::create(['name'=>'testName', 'password' => password_hash('123', 1),'email'=>'test3@live.com']);
        $response = $this->actingAs($user)->get('/action');        
        $response->assertSuccessful();
        $response->assertViewIs('action.create');
        $user->delete();
    }

    /**
     * Test to make sure user can create an argument using this scheme
     * 
     */
    public function test_creating_argument_using_scheme()
    {
        $scheme = new Scheme(['scheme_name' => 'action']);
        $scheme->save();
        $action = Action::create(['circumstance' => 'circumstance', 'action' => 'action', 'goal' => 'goal', 'value' => 'value', 'schemeId' => $scheme->getkey()]);
        $this->assertDatabaseHas('actions',[
            'circumstance'=>'circumstance',
            'action'=>'action',
            'goal'=>'goal',
            'value'=>'value',
            'schemeId'=> $scheme->getkey()
        ]);
        $scheme->delete();
        $action->delete();
    }
}
