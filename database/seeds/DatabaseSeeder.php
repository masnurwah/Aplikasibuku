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
        // $this->call(UserSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesAndPermissionSeeder::class);
        $this->call(LanguageTableSeeder::class);
        $this->call(ModelHasRoles::class);
    }
}
