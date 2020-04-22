<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new \App\User([
        	'name'=>'Nguyễn Văn Hải',
        	'email'=>'hainguyenvan6799@gmail.com',
        	'password'=>bcrypt('Thu01679343794')
        ]);
        $user->save();
    }
}
