<?php 

require 'User.php';

/**
 * 
 */
class Order
{
    
    function __construct()
    {
        
    }

    public function getOrder($orderId = 1)
    {
        $user  = new User($userId = 1);
        $userInfo = $user->getUser();
        $order = [
            'order_id' => $orderId,
            'order_name' => 'my order',
            'user_info'  => $userInfo,
        ]; 

        return $order;
    } 
}
