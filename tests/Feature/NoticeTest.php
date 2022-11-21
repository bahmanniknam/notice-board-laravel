<?php

namespace Tests\Feature;

use App\Models\User;
use App\Services\Notice\Models\Notice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NoticeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store_validation_empty()
    {
        $this->post('notice', [])
            ->assertSessionHasErrors();
    }

    public function test_store_validation_no_user()
    {
        $this->post('notice', [
            "title" => "Bahman",
            "content" => "Niknam"
        ])->assertSessionHasErrors();
    }

    public function test_store_validation_not_existing_user()
    {
        $this->post('notice', [
            "title" => "Bahman",
            "content" => "Niknam",
            "user_id" => 1
        ])->assertSessionHasErrors(['user_id']);
    }

    public function test_store_validation_success()
    {
        $this->seed();

        $this->post('notice', [
            "title" => "Bahman",
            "content" => "Niknam",
            "user_id" => 1
        ])->assertSessionDoesntHaveErrors();
    }

    public function test_index_no_record()
    {
        $this->get('notice')
            ->assertSee("هیچ اعلانی پیدا نکرد");
    }

    public function test_index_has_record()
    {
        $user = User::factory()->create();

        $notice = Notice::factory()
            ->for($user)
            ->create();

        $this->get('notice')
            ->assertSee($notice->title)
            ->assertDontSee("هیچ اعلانی پیدا نکرد");
    }

    public function test_index_has_user_name()
    {
        $user = User::factory()->create();

        $notice = Notice::factory()
            ->for($user)
            ->create();

        $this->get('notice')
            ->assertSee($user->name);
    }
}
