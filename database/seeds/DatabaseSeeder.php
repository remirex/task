<?php

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
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Moderator',
            'password' => '$2y$12$liQgDlT0TzFMm9/MExaVcu32fyq8PwiIG8f0xjtSwTXmVV2qfuArm', // admin1234
            'email' => 'moderator@example.com',
            'role' => 'moderator'
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'hrmanager1',
            'password' => '$2y$12$5BGK6kjMj2l5d5.mq/VqG.LPViOsoB41EbzD24hupZCyd9qwarycW', // hr1234
            'email' => 'hr1@example.com',
            'role' => 'hr'
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'hrmanager2',
            'password' => '$2y$12$5BGK6kjMj2l5d5.mq/VqG.LPViOsoB41EbzD24hupZCyd9qwarycW', // hr1234
            'email' => 'hr2@example.com',
            'role' => 'hr'
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'hrmanager3',
            'password' => '$2y$12$5BGK6kjMj2l5d5.mq/VqG.LPViOsoB41EbzD24hupZCyd9qwarycW', // hr1234
            'email' => 'hr3@example.com',
            'role' => 'hr'
        ]);
    }
}
