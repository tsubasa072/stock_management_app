<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'name' => 'tsubasa',
          'first_name' => '折橋',
          'last_name' => '翼',
          'email' => 'orihashi@tsubasa.com',
          'password' => '1111',
        ];
        DB::table('users')->insert($param);
    }
}
