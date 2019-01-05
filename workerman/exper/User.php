<?php

/**
 * 
 */
class User
{
    
    function __construct()
    {
        # code...
    }

    public function getUser($userId = 1)
    {
        $user = [
            'user_id' => $userId, 
            'user_name' => 'my name',
            'user_age'  => 12
        ];

        $backTrace = debug_backtrace();
        var_dump($backTrace);

        return $user;
    }
}
