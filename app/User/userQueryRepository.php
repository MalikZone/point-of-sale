<?php

namespace App\User;

class userQueryRepository
{
    public function getUser(){
        $user = User::get();
        return $user;
    }

    public function findById($id){
        $user = User::find($id);
        return $user;
    }
}