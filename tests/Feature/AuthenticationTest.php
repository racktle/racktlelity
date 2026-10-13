<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_visitor_can_register_as_a_user_and_open_their_dashboard(): void
    {
        $response = $this->post(route('register.store'), [
            'name' => 'Ayu Belajar',
            'email' => 'ayu@example.test',
            'password' => 'secret-password',
            'password_confirmation' => 'secret-password',
            'terms' => '1',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'email' => 'ayu@example.test',
            'role' => 'user',
        ]);
        $this->assertTrue(Hash::check('secret-password', User::where('email', 'ayu@example.test')->firstOrFail()->password));
        $this->get(route('dashboard'))->assertOk()->assertSee('Ayu Belajar');
    }

    public function test_public_registration_cannot_create_an_admin_account(): void
    {
        $this->post(route('register.store'), [
            'name' => 'Pengguna Baru',
            'email' => 'baru@example.test',
            'password' => 'secret-password',
            'password_confirmation' => 'secret-password',
            'terms' => '1',
            'role' => 'admin',
        ])->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('users', [
            'email' => 'baru@example.test',
            'role' => 'user',
        ]);
    }

    public function test_admin_dashboard_is_forbidden_to_regular_users(): void
    {
        $user = User::create([
            'name' => 'Pelajar',
            'email' => 'pelajar@example.test',
            'password' => 'secret-password',
            'role' => 'user',
        ]);

        $this->actingAs($user)
            ->get(route('admin.dashboard'))
            ->assertForbidden();
    }

    public function test_admin_can_open_the_admin_dashboard(): void
    {
        $admin = User::create([
            'name' => 'Admin Racktility',
            'email' => 'admin@example.test',
            'password' => 'secret-password',
            'role' => 'admin',
        ]);

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Dashboard admin')
            ->assertSee('Total pengguna');
    }
}
