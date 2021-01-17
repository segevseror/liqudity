<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'logo' => 'logo/sss',
            'website' => 'www.one.com',
        ]);

        DB::table('employees')->insert([
            'First Name' => 'segev',
            'Last Name' => 'seror',
            'email' => 'vman120@gmail.com',
            'phone' => '0546465625',
            'company' => '1',
        ]);
    }
}
