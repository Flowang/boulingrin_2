<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

      public function run()
    {
        DB::table('users')->insert([
            'name' => 'Louis Hans',
            'email' => 'louis.hans@laposte.fr',
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
            'joma' => 'lundi matin',
        ]);
           DB::table('joma')->insert([
            'joma' => 'lundi après-midi',
        ]);
           DB::table('joma')->insert([
            'joma' => 'mardi matin',
        ]);
            DB::table('joma')->insert([
            'joma' => 'mardi après-midi',
        ]);
           DB::table('joma')->insert([
            'joma' => 'mercredi matin',
        ]);
              DB::table('joma')->insert([
            'joma' => 'mercredi après-midi',
        ]);
           DB::table('joma')->insert([
            'joma' => 'jeudi matin',
        ]);
              DB::table('joma')->insert([
            'joma' => 'jeudi après-midi',
        ]);
           DB::table('joma')->insert([
            'joma' => 'vendredi matin',
        ]);
              DB::table('joma')->insert([
            'joma' => 'vendredi après-midi',
        ]);
           DB::table('joma')->insert([
            'joma' => 'samedi matin',
        ]);
            DB::table('joma')->insert([
            'joma' => 'samedi après-midi',
        ]);
           DB::table('joma')->insert([
            'joma' => 'dimanche matin',
        ]);
            DB::table('joma')->insert([
            'joma' => 'dimanche après-midi',
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
