<?php

use Illuminate\Database\Seeder;
use \App\Siswa;

class SiswaTablerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Siswa::class, 50)->create();
    }
}
