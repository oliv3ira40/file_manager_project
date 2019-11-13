<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserDeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	'group_id'=>'1',
			'first_name'=>'Augusto',
			'last_name'=>'Oliveira',
			'email'=>'oliv3ira40@hotmail.com',
			'password'=>bcrypt('xgppa007')
		];
		if (User::where('email', '=', $data['email'])->count()) {
			$user = User::where('email', '=', $data['email'])->first();
			$user->update($data);
			echo "Usuario alterado!";
		} else {
			User::create($data);
			echo "Usuario cadastrado!";
		}
    }
}
