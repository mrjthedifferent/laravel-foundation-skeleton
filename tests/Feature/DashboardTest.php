<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    protected bool $seed = true;

    public function test_guests_are_sent_to_the_sign_in_page(): void
    {
        $this->get('/')->assertRedirect('/admin/dashboard');
        $this->get('/admin/dashboard')->assertRedirect(route('login'));
        $this->withoutVite()->get(route('login'))->assertOk();
    }

    public function test_seeding_creates_no_account(): void
    {
        $this->assertSame(0, User::count());
    }

    public function test_a_super_admin_made_by_the_console_signs_in_and_sees_everything(): void
    {
        $this->artisan('foundation:super-admin', [
            'login' => 'owner@example.com', '--name' => 'Owner', '--password' => 'a-strong-password', '--no-interaction' => true,
        ])->assertSuccessful();

        $this->withoutVite()
            ->post(route('login'), ['login' => 'owner@example.com', 'password' => 'a-strong-password'])
            ->assertRedirect('/admin/dashboard');

        $this->get('/admin/dashboard')
            ->assertOk()
            ->assertSee('Administration')
            ->assertSee(route('admin.users.index'))
            ->assertSee('assets/css/foundation.css');

        $this->get(route('admin.users.index'))->assertOk();
        $this->get(route('admin.role.index'))->assertOk();
    }

    public function test_a_user_signs_in_with_their_phone_number(): void
    {
        $user = User::factory()->create(['phone' => '+8801712345678', 'password' => 'secret-password']);

        $this->post(route('login'), ['login' => '+8801712345678', 'password' => 'secret-password'])
            ->assertRedirect('/admin/dashboard');

        $this->assertAuthenticatedAs($user);
    }

    public function test_the_super_admin_can_sync_permissions(): void
    {
        $this->actingAs(User::factory()->superAdmin()->create())
            ->post('/admin/permissions/sync')
            ->assertRedirect()
            ->assertSessionMissing('error');
    }

    public function test_a_user_without_permissions_sees_no_admin_menu(): void
    {
        $this->withoutVite()
            ->actingAs(User::factory()->create())
            ->get('/admin/dashboard')
            ->assertOk()
            ->assertDontSee(route('admin.users.index'));

        $this->get(route('admin.users.index'))->assertForbidden();
    }
}
