<?php

namespace App\User;

use App\User\userQueryRepository;
use Illuminate\Support\Facades\Hash;

class userRepository
{
    public function __construct(userQueryRepository $user_query){
        $this->user_query = $user_query;
    }

    public function getUser(){
        $user = $this->user_query->getUser();
        return $user;
    }

    public function saveUser($request){
        $user = new User();

        $user->id = $user->id;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->address = $request['address'];
        $user->role = $request['role'];
        $user->password = Hash::make('pos123');
        $user->save();

        return $user;
    }

    public function deleteUser($id){
        $user = $this->user_query->findById($id);
        if($user){
            $user->delete();
            return true;
        }
        return $user;
    }
}
