<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Empresa;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

      // Create 20 record Empresas
      Empresa::factory(20)->create();
      // \App\Models\User::factory(10)->create();
      //$this->call(EmpresaSeeder::class);

      // Create User Dev
      DB::table('users')->insert([
        'name' => 'GasNatur',
        'email' => 'gasnatur@gmail.com',
        'password' => Hash::make('123'),
      ]);
    }



}
