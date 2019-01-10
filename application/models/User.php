<?php

namespace app\models;

class User
{
    public function getUser()
    {
        $user = eloquent\Test::find(1);
        
        return $user->name;
    }
}
