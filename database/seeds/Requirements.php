<?php

use Illuminate\Database\Seeder;
use Modules\Requirements\Entities\Requirement;

class Requirements extends Seeder
{
	protected $data = [
		[
			'client_id' => 1,
			'parent_id' => 0,
			'title' => 'Temple Administration',
			'description' => 'Temple Administration',
			'developer_assigned' => 1,
			'tester_assigned' => 1,
			'user_created' => 1,
			'user_updated' => 1
		],
		[
			'client_id' => 1,
			'parent_id' => 0,
			'title' => 'System And Settings',
			'description' => 'Temple Administration',
			'developer_assigned' => 1,
			'tester_assigned' => 1,
			'user_created' => 1,
			'user_updated' => 1
		],
		[
			'client_id' => 1,
			'parent_id' => 0,
			'title' => 'Another Requirements',
			'description' => 'Temple Administration',
			'developer_assigned' => 1,
			'tester_assigned' => 1,
			'user_created' => 1,
			'user_updated' => 1
		]
	];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	foreach ($this->data as $key => $value) {
    		Requirement::create($value);
    	}
        
    }
}
