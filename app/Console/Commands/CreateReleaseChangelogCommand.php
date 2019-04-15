<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\ReleaseChangelogs;

class CreateReleaseChangelogCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'changelogs:create {version} {changes*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command adds new row to release_changelogs table in the DB.
                              Both arguments has to be added: version&changes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $changelog = new ReleaseChangelogs();
        $changelog->version = $this->argument('version');
        
        $st = '';
        foreach($this->argument('changes') as $ch) {
            $st = $st.' '.$ch;
        }
        $changelog->changes = $st;
        $changelog->save();
        $this->info('Release changelog was succefully created!');    
    }
}
