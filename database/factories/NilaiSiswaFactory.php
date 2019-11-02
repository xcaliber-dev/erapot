<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\NilaiSiswa;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(NilaiSiswa::class, function (Faker $faker) {
    $nis = ['70947', '75448', '92799', '50309'];

    return [
        'nis'=>$faker->randomElement($nis),
        'mtk'=>$faker->randomNumber(2),
        'ipa'=>$faker->randomNumber(2),
        'ips'=>$faker->randomNumber(2),
    ];
});
