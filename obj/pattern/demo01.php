<?php

// 玩过很多网络游戏的童鞋们应该知道，即便是斗地主，除了玩家，还有一个角色叫“观察者"。在我们今天他谈论的模式设计中，观察者也是如此。首先，要有一个“主题”。只有有了一个主题，观察者才能搬着小板凳儿聚在一堆。其次，观察者还必须要有自己的操作。否则你聚在一堆儿没事做也没什么意义。

// 　　　从面向过程的角度来看，首先是观察者向主题注册，注册完之后，主题再通知观察者做出相应的操作，整个事情就完了。

// 　　　从面向对象的角度来看，主题提供注册和通知的接口，观察者提供自身操作的接口。（这些观察者拥有一个同一个接口。）观察者利用主题的接口向主题注册，而主题利用观察者接口通知观察者。耦合度相当之低。

interface Subject
{
    public function register(Observer $observer);

    public function notify();
}

interface Observer
{
    public function watch();
}



// subject
class Action implements Subject
{
    public $_observers = [];

    public function register(Observer $observer)
    {
        $this->_observers[] = $observer;
    }

    public function notify()
    {
        foreach ($this->_observers as $key => $observer) {
            $observer->watch();
        }
    }
}


// observer

class Cat implements Observer
{
    public function watch()
    {
        echo 'cat watch', "\n";
    }
}

class Dog implements Observer
{
    public function watch()
    {
        echo 'dog watch', "\n";
    }
}

$act = new Action();
$act->register(new Dog());
$act->register(new Cat());

// var_dump($act);

$act->notify();
