<?php

namespace App\Models;
/**
 * Created by PhpStorm.
 * User: Cyberio
 * Date: 10/02/17
 * Time: 08:37 AM
 */
use Core\Model;


class User extends Model
{
    protected $table = 'system_users';
    protected $primaryKey = 'user_id';

    /*public function store($request){


        try{

            $user = new User;

            $user->member_id=1;
            $user->name=$request['name'];
            $user->email=$request['email'];
            $user->password=sha1($request['password']);
            $user->timestamps;

            $user->save();

            return $user->id;

        }catch (\Exception $e){
             return false;
        }


    }*/

    public function userType()
    {
        return $this->hasOne('App\UserType','type_id','type');
    }

}