<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Actions\Fortify;
use Auth;
use App\Models\User;
use App\Models\Debate;
use App\Models\Argument;
use App\Models\Scheme; 
use App\Models\PopularOpinion;


class PopularOpinionTest extends TestCase
{

    /**
     *  Test to check if a user can see the form to create a popular opinion argument. 
     *
     * @return void
     */
    public function test_guest_cant_see_create_form()
    {
        $response = $this->get('/popularopinion');     
        $response->assertRedirect('login');   
    }
    /**
     *  Test to check if a user can see the form to create a popular opinion argument. 
     *
     * @return void
     */
    public function test_user_can_see_create_form()
    {
        $user = User::create(['name'=>'testName', 'password' => password_hash('123', 1),'email'=>'test3@live.com']);
        $response = $this->actingAs($user)->get('/popularopinion');        
        $response->assertSuccessful();
        $response->assertViewIs('popularopinion.create');
        $user->delete();
    }

    /**
     * Test to make sure user can create an argument using this scheme
     * 
     */
    public function test_creating_argument_using_scheme()
    {
        $scheme = new Scheme(['scheme_name' => 'Popular Opinion']);
        $scheme->save();
        $popOp = PopularOpinion::create(['proposition' => 'proposition', 'schemeId' => $scheme->getkey()]);
        $this->assertDatabaseHas('popular_opinions',[
            'proposition'=>'proposition',
            'schemeId'=> $scheme->getkey(),
        ]);
        $scheme->delete();
        $popOp->delete();
    }
}
