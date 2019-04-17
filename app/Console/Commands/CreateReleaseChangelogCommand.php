<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\ReleaseChangelogs;
use Validator;

class CreateReleaseChangelogCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'changelogs:create';
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
        $version = $this->ask('Add version:');
        $changes = $this->ask('Add changes:');
        $validator = Validator::make([
            'version' => $version,
            'changes' => $changes
        ],[
            'version' => 'required|min:3',
            'changes' => 'required|min:3'
        ]);
        if ($validator->fails()) {
            $this->info('Staff User not created. See error messages below:');
        
            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }
        //$validated = $request->validated();
        //if($validated)

        $changelog = new ReleaseChangelogs();
        $changelog->version = $version;
        $changelog->changes = $changes;
        $changelog->save();

        $this->info('Release changelog was succefully created!');    
    }
}
