<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

      public function run()
    {
        DB::table('users')->insert([
            'name' => 'Louis Hans',
            'email' => 'louis.hans@viacesi.fr',
            'password' => bcrypt('Perl!c0tte'),
            'roles_id' => '3',

        ]);
         DB::table('users')->insert([
            'name' => 'Louis Haaas',
            'email' => 'louis.haaas@viacesi.fr',
            'password' => bcrypt('Perl!c0tte'),
            'roles_id' => '2',

        ]);
         DB::table('users')->insert([
            'name' => 'Cogniard & Fils',
            'email' => 'cogniard@viacesi.fr',
            'password' => bcrypt('Perl!c0tte'),
            'roles_id' => '1',
        ]);

   DB::table('joma')->insert([
            'joma' => 'lundi',
        ]);
           DB::table('joma')->insert([
            'joma' => 'mardi',
        ]);
           DB::table('joma')->insert([
            'joma' => 'mercredi',
        ]);
           DB::table('joma')->insert([
            'joma' => 'jeudi',
        ]);
           DB::table('joma')->insert([
            'joma' => 'vendredi',
        ]);
           DB::table('joma')->insert([
            'joma' => 'samedi',
        ]);
           DB::table('joma')->insert([
            'joma' => 'dimanche',
        ]);


 DB::table('roles')->insert([
            'name' => 'Client',
            'description' => 'Client',
        ]);
         DB::table('roles')->insert([
            'name' => 'Commerçant',
            'description' => 'Commerçant',
        ]);
         DB::table('roles')->insert([
            'name' => 'Administrateur',
            'description' => 'Administrateur',
        ]);

    }
}
