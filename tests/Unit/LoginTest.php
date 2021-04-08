<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Actions\Fortify;
use Auth;
use App\Models\User;

class LoginTest extends TestCase
{
    /**
     *  Test to check if a user can see a login form when going to the login page. 
     *
     * @return void
     */
    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');
        
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /**
     * Test to check if a user can launch the forgotten password page.
     * 
     */
    public function test_user_can_view_forgotten_password_form()
    {
        $response = $this->get('/forgot-password');
        
        $response->assertSuccessful();
        $response->assertStatus(200);
    }

    /**
     * Test to check if user can still access login form when already logged in. 
     * 
     */
    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = User::create(['name'=>'testName', 'password' => password_hash('123', 1),'email'=>'test3@live.com']);
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/home');
        $user->delete();
    }

    /**
     * Test to check if user can login with correct credentials
     * 
     */
    public function test_user_can_login_with_correct_credentials()
    {
        $user = User::create(['name'=>'testName', 'password' => password_hash('123', 1),'email'=>'test3@live.com']);
        Auth::login($user);
        $this->assertAuthenticatedAs($user);
        $user->delete();
    }
   
    /**
     * Test to make sure user can not login with an incorrect password
     * 
     */
    public function test_user_cannot_login_with_incorrect_password()
    {
        $user = User::create(['name'=>'testName', 'password' => password_hash('123', 1),'email'=>'test5@live.com']);
        
        $response = $this->from('/login')->post('/login', [
            'username' => $user->username,
            'password' => 'invalid-password',
        ]);
        $response->assertRedirect('/login');
        $this->assertGuest();
        $user->delete();
    }

     /**
     * Checks that an account can be created and successfully added to the database
     * 
     */
    public function test_directly_adding_to_users_db()
    {
        $user = User::create(['name'=>'testName', 'password' => password_hash('123', 1),'email'=>'test@test.com']);
        $this->assertDatabaseHas('users',[
            'name'=>'testName',
            'email'=>'test@test.com'
        ]);
        $user->delete();
    }

     /**
     * Tests that user account information can be edited and saved within the database
     */
    public function test_directly_editing_to_users_db()
    {
        $user = User::create(['name'=>'testName', 'password' => password_hash('123', 1),'email'=>'test@test.com']);
        $userId= $user->id;
        $userToEdit= User::find($userId);
        
        $userToEdit->name="editedName";
        $userToEdit->save();
        $this->assertDatabaseHas('users',[
            'name'=>'editedName',
            'email'=>'test@test.com'
        ]);

        $userToEdit->delete();

    }
}
