<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        $company = DB::table('companies')->insert([
            'name' => 'One company',
            'email' => 'One@company.com',
            'logo' => '',
            'website' => 'www.one.com',
            'valid' => '1',
            'created_at' => new \DateTime(),
        ]);

        DB::table('employees')->insert([
            'fname' => 'segev',
            'lname' => 'seror',
            'valid' => '1',
            'email' => 'vman120@gmail.com',
            'phone' => '0546465625',
            'company' => '1',
        ]);
    }
}
