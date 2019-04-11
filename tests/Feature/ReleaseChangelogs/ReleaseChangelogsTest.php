<?php

namespace Tests\Feature\ReleaseChangelogs;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\ReleaseChangelogs;

class ReleaseChangelogsTest extends TestCase
{
    use WithoutMiddleware;

    public function testChangelogsSave()
    {   
        $response = $this->json('POST', '/changelogs',[
            'changes' => '1.01',
            'version' => 'Extra buttons'
        ]);
               
        $this->assertDatabaseHas('release_changelogs', [
            'changes' => '1.01',
            'version' => 'Extra buttons'
        ]);

        $response
            ->assertStatus(302)             // 302 cause of redirection
            ->assertLocation('/changelogs');
    }

    public function testChangelogsDelete()
    {
        $lastRow = ReleaseChangelogs::all()->last();
        $id = $lastRow->id;

        $uri = '/changelogs/'.$id;
        $response = $this->json('DELETE', $uri);
 
        $this->assertDatabaseMissing('release_changelogs', $lastRow->toArray());

        $response
            ->assertStatus(302)             // 302 cause of redirection
            ->assertLocation('/changelogs');
    }
    
    public function testChangelogsUpdate(){
        $id = ReleaseChangelogs::all()->last()->id;

        $uri = '/changelogs/'.$id;
        $response = $this->json('PATCH', $uri, [
            'version' => '1.02',
            'changes' => 'Home button shortcut'
        ]);
        
        $this->assertDatabaseHas('release_changelogs', [
            'version' => '1.02',
            'changes' => 'Home button shortcut'
        ]);

        $response
            ->assertStatus(302)             // 302 cause of redirection
            ->assertLocation('/changelogs');
    }

}
