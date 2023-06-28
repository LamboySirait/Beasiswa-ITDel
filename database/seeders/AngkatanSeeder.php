<?php

namespace Database\Seeders;

use App\Models\Angkatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AngkatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Angkatan::insert([
            ['id' => 1,
            'angkatan'=> '2017'],
            ['id' => 2,
            'angkatan'=> '2018'],
            ['id' => 3,
            'angkatan'=> '2019'],
            ['id' => 4,
            'angkatan'=> '2020'],
            ['id' => 5,
            'angkatan'=> '2021'],
            ['id' => 6,
            'angkatan'=> '2022']
        ]);
    }
}
