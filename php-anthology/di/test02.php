<?php

/**
 * 定义storage接口让User仅依赖于Storage接口
 */
interface Storage
{
    public function set($key, $value);

    public function get($key);

    public function exists($key);
}

class SessionStorage implements Storage
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


/**
 * User 类看起来既依赖于 Storage 接口又依赖于 SessionStorage 这个具体实现：
 *
 */
/**
class User
{
    protected $storage;

    public function __construct()
    {
        $this->storage = new SessionStorage();
    }

}

 */
// 如果使用者将「会话」机制更换到下列这些存储方式呢？
// User 类的构造函数的的情况下，完成替换 SessionStorage 类的实例化过程。
// 即我们的模块与依赖的具体实现类耦合到一起了。

class MysqlStorage {}
class RedisStorage {}
class MencacheStorage {}
class MongoStorage {}
class OracleStorage {}

// 有没有这样一种解决方案，让我们的模块仅依赖于接口类，
// 然后在项目运行阶段动态的插入具体的实现类，而非在编译（或编码）阶段将实现类接入到使用场景中
//

// 控制反转提供了将插件组合进模块的能力
//
// 反转意义是 如何去定位插件的具体实现
//
// 形式： 构造注入 设值注入 接口注入
//


class User
{
    protected $storage;
    
    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
    }
}

// $storage = new SessionStorage('SESSION_ID');
// $user = new User($storage);



// setter设值方法注入

/*
class User
{
    protected $storage;

    public function setStorage(Storage $storage)
    {
        $this->storage = $storage;
    }
}

$storage = new SessionStorage('SESSION_ID');
$user = new User();
$user->setStorage($storage);

 */

// 依赖注入容器: 是一个知道如何去实例化和配置依赖组件的对象。
//

class Container
{
    public function getStorage()
    {
        return new SessionStorage();
    }

    public function getUser()
    {
        $user = new User($this->getStorage());

        return $user;
    }
}

$container = new Container();
$user = $container->getUser();
