<?php namespace Modules\Requirements\Entities;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
    	'item_id',
    	'type',
    	'path'
    ];
}
