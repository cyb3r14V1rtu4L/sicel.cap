<?php
namespace App\Models;
use Core\Model;

class UserType extends Model
{
    protected $table = 'system_users_type';

    public function user()
    {
        return $this->belongsTo('App\User','type','type_id');
    }
}