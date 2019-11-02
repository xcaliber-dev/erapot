<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Siswa;
use Faker\Generator as Faker;

$factory->define(Siswa::class, function (Faker $faker) {
    $kelas = ['X', 'XI', 'XII'];
    $jurusan = ['IPA', 'IPS'];
    $urutan = [1, 2, 3, 4];
    $directory = '/public/image/siswa/';
    return [
        'nis'=>$faker->randomNumber(5),
        'nama_siswa'=>$faker->name,
        'kelas'=>$faker->randomElement($kelas).'-'.$faker->randomElement($jurusan).$faker->randomElement($urutan),
        'status_lulus'=>false,
        'alamat'=>$faker->address,
        'jenis_kelamin'=>$faker->randomElement(['L', 'P']),
        'tgl_lahir'=>$faker->date('Y-m-d','now'),
        'tempat_lahir'=>$faker->city,
        'no_telp'=>$faker->phoneNumber,
        'email'=>$faker->safeEmail,
        'foto'=>$directory.$faker->name,
    ];
});
