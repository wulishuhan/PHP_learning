<?php
/*
 * 当一个对象的状态发生改变时，
 * 所有依 赖于它的对象都得到通知并自动刷新。
 */
class MyObserver1 implements SplObserver{

    public function update(SplSubject $subject)
    {
        echo __CLASS__.'-'.$subject->getName();
    }
}
class MyObserver2 implements SplObserver{

    public function update(SplSubject $subject)
    {
        echo __CLASS__.'-'.$subject->getName();
    }
}
class MySubject implements SplSubject {
    private $_observers;
    private $_name;
    public function __construct($_name)
    {
        $this->_observers=new SplObjectStorage();
        $this->_name = $_name;
    }
    public function attach(SplObserver $observer){
        $this->_observers->attach($observer);
    }
    public function detach(SplObserver $observer){
        $this->_observers->detach($observer);
    }

    public function notify()
    {
       foreach ($this->_observers as $observer){
           $observer->update($this);
       }
    }
    public function getName(){
        return $this->_name;
    }
}
$observer1=new MyObserver1();
$observer2=new MyObserver2();
$subject=new MySubject("test");
$subject->attach($observer1);
$subject->attach($observer2);
$subject->notify();