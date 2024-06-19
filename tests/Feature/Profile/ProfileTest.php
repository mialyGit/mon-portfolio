<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\Models\User;
use Database\Seeders\ProfileSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_current_profile_information_is_available(): void
    {
        $this->seed(ProfileSeeder::class);

        $response = $this->get('/dashboard/profile');

        $response->assertStatus(200);
    }

    // public function test_profile_update_requires_firstname_and_email()
    // {
    //     $user = User::factory()->create();

    //     $response = $this->actingAs($user)
    //         ->post(route('dashboard.profile.save'), []);

    //     $response->assertSessionHasErrors(['name', 'firstname']);
    // }

    public function test_current_profile_information_can_be_updated(): void
    {
        $user = User::factory()->create();
        $profile = Profile::factory()->make()->toArray();

        $response = $this->actingAs($user)->post(
            route('dashboard.profile.save'),
            $profile
        );

        $response->assertRedirectToRoute('dashboard.profile')
            ->assertSessionHas('message', __('Updated with success'));

        $this->assertDatabaseHas('profiles', $profile);
    }
}
