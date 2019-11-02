<?php

use App\NilaiSiswa;
use Illuminate\Database\Seeder;

class NilaiSiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(NilaiSiswa::class, 5)->create();
    }
}
