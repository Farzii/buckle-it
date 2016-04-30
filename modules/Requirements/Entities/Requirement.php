<?php namespace Modules\Requirements\Entities;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $fillable = [
    	'client_id',
    	'parent_id',
    	'title',
    	'description',
    	'developer_assigned',
    	'tester_assigned',
        'reference_number',
    	'user_created',
    	'user_updated',
    	'created_at',
    	'updated_at'
    ];
}
