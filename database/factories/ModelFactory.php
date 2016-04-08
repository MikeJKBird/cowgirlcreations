<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->defineAs(App\User::class, 'admin', function ($faker) {
    return [
        'name' => 'Mike Bird',
        'email' => '123@fake.com',
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
        'isadmin' => true,
    ];

});
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('password'),
        'points' => $faker->randomDigit,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->lexify('????? race'),
        'location' => $faker->city,
        'cosanction' => $faker->name,
        'deadline' => $faker->numerify('# days before'),
        'producer' => $faker->name,
        'notes' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'dresscode' => 'dress to impress',
        'option' => 1/2,
        'timeonly' => $faker->randomDigit,
        'latefee' => $faker->randomDigit,
        'arenafee' => $faker->randomDigit,
        'campingfee' => $faker->randomDigit,
        'stallfee' => $faker->randomDigit,
        'bbq' => $faker->randomDigit,
        'multiplier' => $faker->randomDigit,
        'date' => $faker->dateTime
    ];
});
