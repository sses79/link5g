<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * @group stripe
 */
class RegistrationTest extends TestCase
{
//    use CreatesTeams, DatabaseMigrations, InteractsWithPaymentProviders;
    use DatabaseTransactions;

    public function test_users_can_register()
    {
//        $response = $this->get('/login');
//
//        $response->assertStatus(200);

//            'team' => 'Laravel',
//            'terms' => true,
        $response = $this->json('POST', '/register', [
            'name' => 'Tim',
            'email' => 'sses79@gmail.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('users', [
            'email' => 'sses79@gmail.com',
        ]);

//        $this->assertTrue(
//            User::where('email', 'taylor@laravel.com')->first()->onGenericTrial()
//        );
    }


//    public function test_user_can_subscribe_to_plan()
//    {
//        $this->json('POST', '/register', [
//            'plan' => 'spark-test-1',
//            'stripe_token' => $this->getStripeToken(),
//            'team' => 'Laravel',
//            'name' => 'Taylor Otwell',
//            'email' => 'taylor@laravel.com',
//            'password' => 'secret',
//            'password_confirmation' => 'secret',
//            'terms' => true,
//        ]);
//
//        $this->seeStatusCode(200);
//
//        $this->seeInDatabase('users', [
//            'email' => 'taylor@laravel.com',
//        ]);
//
//        $user = User::where('email', 'taylor@laravel.com')->first();
//
//        $this->assertTrue($user->subscribed());
//        $this->assertEquals('spark-test-1', $user->subscription()->stripe_plan);
//    }
//
//
//    public function test_user_can_register_with_invitation()
//    {
//        $team = $this->createTeam();
//
//        $invitation = $team->invitations()->create([
//            'id' => Uuid::uuid4(),
//            'email' => 'test@spark.laravel.com',
//            'token' => str_random(40),
//        ]);
//
//        $this->json('POST', '/register', [
//            'invitation' => $invitation->token,
//            'team' => 'Laravel',
//            'name' => 'Taylor Otwell',
//            'email' => 'taylor@laravel.com',
//            'password' => 'secret',
//            'password_confirmation' => 'secret',
//            'terms' => true,
//        ]);
//
//        $this->seeStatusCode(200);
//
//        $user = User::where('email', 'taylor@laravel.com')->first();
//
//        $this->assertEquals(1, $user->teams()->count());
//        $this->assertEquals($team->name, $user->teams()->first()->name);
//        $this->assertEquals('member', $user->roleOn($user->teams()->first()));
//    }
}