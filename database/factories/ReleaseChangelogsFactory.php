<?php

use Faker\Generator as Faker;

$factory->define(App\ReleaseChangelogs::class, function (Faker $faker) {
    $rand = Str::random(5);
    return [
        // values for seeding the DB
        'version' => '1.0Test: '.$rand,
        'changes' => 'Added button with code: '.$rand
    ];
});
