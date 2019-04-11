<?php

namespace Tests\Feature\ReleaseChangelogs;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\ReleaseChangelogs;

class ReleaseChangelogsViewTest extends TestCase
{
    public function testChangelogsTest()
    {
        $response = $this->get('/changelogs');

        $response->assertStatus(200);
    }

    public function testChangelogsCreateTest()
    {
        $response = $this->get('/changelogs/create');

        $response->assertStatus(200);
    }
}
