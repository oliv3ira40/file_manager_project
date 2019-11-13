<?php

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupDeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	'name'=>'Desenvolvedor'
		];
		if (Group::where('name', '=', $data['name'])->count()) {
			$group = Group::where('name', '=', $data['name'])->first();
			$group->update($data);
			echo "Grupo alterado!";
		} else {
			Group::create($data);
			echo "Grupo cadastrado!";
		}
    }
}
