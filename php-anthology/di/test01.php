<?php

// 实现某个功能模块需要用到另外的一个或多个组件（服务）
// 依赖注入：向使用者注入某个【组件】以供其使用

// 组件：可能被作者无法控制的其他应用使用，但使用者不能对其源码进行修改的一个功能模块
// 服务：使用者以同步或异步的方式请求的功能接口
//
// 组件与服务：
// 相同点：被其他功能或应用使用
// 不同：组件是本地使用，接口是远程使用
//

// 使用依赖注入实现功能模块对齐依赖组件的控制反转
// 依赖注入的目标：将依赖组件的配置和使用分离开，降低使用者与依赖之间的耦合度

class SessionStorage
{
    public function __construct($cookieName = 'PHP_SESS_ID')
    {
        session_name($cookieName);
        session_start();
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        return $_SESSION[$key] ?? null;
    }

    public function exists($key)
    {
        return (boolean)$this->get($key);
    }
}

class User
{
    protected $storage;

    public function __construct()
    {
        $this->storage = new SessionStorage();
    }
    
    /**
     * login方法依赖于$this->storage这个具体实现，即耦合到了一起
     */
    public function login($user)
    {
        if (!$this->storage->exists('user')) {
            $this->storage->set('user', $user);
        }

        return 'success';
    }

    public function getUser()
    {
        return $this->storage->get('user');
    }
}

$user = new User();
$user->login(
    [
        'uid' => 1,
        'uname' => '么么哒',
    ]
);
$loginUser = $user->getUser();


