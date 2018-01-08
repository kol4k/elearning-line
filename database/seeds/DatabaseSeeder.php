<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('access')->insert([
            'name' => 'Administrator',
        ]);
        DB::table('access')->insert([
            'name' => 'User',
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
