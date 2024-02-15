<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


         \App\Models\Student::factory(10)->create();
//         \App\Models\Student::create(      [
//
//             "nis" => "05021",
//             "nama" => "Nando",
//             "kelas" => "11 PPLG 1",
//             "alamat" => "Jakarta"
//         ],);
//         \App\Models\ExtraCuricular::factory(1000)->create();
    }


}
