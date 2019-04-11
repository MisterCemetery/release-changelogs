<?php

use Illuminate\Database\Seeder;
use App\ReleaseChangelogs;

class ReleaseChangelogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(ReleaseChangelogs::class, 5)->create();
    }
}
