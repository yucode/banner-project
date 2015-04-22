<?php

use gateway\User as User;

class Authenticate
{
    public function auth()
    {
        $user = new User();
        $user->auth();

    }
}