<?php


namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait UserTrait{

    public function createUser($name, $username, $password, $rol){
        $user = new User();
        $user->name = $name;
        $user->username = $username;
        $user->password = Hash::make($password);
        $user->rol = $rol;
        $user->save();

        return $user->id;
    }

    public function updateUser($user_id, $name, $username, $password){
        $user = User::findOrFail($user_id);
        $user->name = $name;
        $user->username = $username;
        $user->password = Hash::make($password);
        $user->save();

    }

    public function deleteUser($user_id){
        $user = User::findOrFail( $user_id );
        $user->delete();

    }


}




