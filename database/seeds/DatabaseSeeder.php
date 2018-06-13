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

   DB::table('jomas')->insert([
            'joma' => 'lundi matin',
        ]);
           DB::table('jomas')->insert([
            'joma' => 'lundi après-midi',
        ]);
           DB::table('jomas')->insert([
            'joma' => 'mardi matin',
        ]);
            DB::table('jomas')->insert([
            'joma' => 'mardi après-midi',
        ]);
           DB::table('jomas')->insert([
            'joma' => 'mercredi matin',
        ]);
              DB::table('jomas')->insert([
            'joma' => 'mercredi après-midi',
        ]);
           DB::table('jomas')->insert([
            'joma' => 'jeudi matin',
        ]);
              DB::table('jomas')->insert([
            'joma' => 'jeudi après-midi',
        ]);
           DB::table('jomas')->insert([
            'joma' => 'vendredi matin',
        ]);
              DB::table('jomas')->insert([
            'joma' => 'vendredi après-midi',
        ]);
           DB::table('jomas')->insert([
            'joma' => 'samedi matin',
        ]);
            DB::table('jomas')->insert([
            'joma' => 'samedi après-midi',
        ]);
           DB::table('jomas')->insert([
            'joma' => 'dimanche matin',
        ]);
            DB::table('jomas')->insert([
            'joma' => 'dimanche après-midi',
        ]);


        DB::table('joma_users')->insert([
            'id_users' => '1',
            'id_joma' => '1',
        ]);
        DB::table('joma_users')->insert([
            'id_users' => '1',
            'id_joma' => '2',
        ]);
        DB::table('joma_users')->insert([
            'id_users' => '1',
            'id_joma' => '3',
        ]);
        DB::table('joma_users')->insert([
            'id_users' => '1',
            'id_joma' => '4',
        ]);
        DB::table('joma_users')->insert([
            'id_users' => '1',
            'id_joma' => '5',
        ]);
        DB::table('joma_users')->insert([
            'id_users' => '2',
            'id_joma' => '1',
        ]);
        DB::table('joma_users')->insert([
            'id_users' => '2',
            'id_joma' => '2',
        ]);
        DB::table('joma_users')->insert([
            'id_users' => '2',
            'id_joma' => '3',
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



        DB::table('products')->insert([
            'nom' => 'Pomme Verte',
            'prix_unite' => '2',
            'description' => 'Je suis une pomme 1',
            'users_id' => '1',
            'categories_id' => '1',
        ]);
        DB::table('products')->insert([
            'nom' => 'Pomme rouge',
            'prix_unite' => '2',
            'description' => 'Je suis une pomme 2',
            'users_id' => '1',
            'categories_id' => '1',
        ]);
        DB::table('products')->insert([
            'nom' => 'Pomme Jaune',
            'prix_unite' => '4',
            'description' => 'Je suis une pomme 3',
            'users_id' => '1',
            'categories_id' => '1',
        ]);
        DB::table('products')->insert([
            'nom' => 'Pomme noire',
            'prix_unite' => '5',
            'description' => 'Je suis une pomme 4',
            'users_id' => '2',
            'categories_id' => '1',
        ]);

        DB::table('products')->insert([
            'nom' => 'Pomme Verte',
            'prix_unite' => '2',
            'description' => 'Je suis une pomme 5',
            'users_id' => '2',
            'categories_id' => '1',
        ]);
        DB::table('products')->insert([
            'nom' => 'Pomme Verte',
            'prix_unite' => '2',
            'description' => 'Je suis une pomme 6',
            'users_id' => '2',
            'categories_id' => '1',
        ]);


        DB::table('fiches')->insert([
            'title' => 'Cogniard & Fils',
            'user_id' => '1',
            'description' => 'Je vends de la volaille sous vide, et je fais plein de chose très intéressante',
        ]);        
        DB::table('fiches')->insert([
            'title' => 'Champfleury & Co',
            'user_id' => '2',
            'description' => 'Jadore les fruits et les légumes, cest vraiment super sympa',
        ]);        
        DB::table('fiches')->insert([
            'title' => 'JeSuisPecheur',
            'user_id' => '3',
            'description' => 'Je suis un passioné de poisson, jen mange tous les jours, cest la folie',
        ]);


    }
}
