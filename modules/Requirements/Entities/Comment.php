<?php namespace Modules\Requirements\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'item_id',
    	'type',
    	'comment',
        'user_created',
        'user_updated'
    ];
}
