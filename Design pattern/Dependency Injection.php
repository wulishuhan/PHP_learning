<?php
/*
 * 依赖注入的实质就是把一个类不可能更换的部分
 *  可更换的部分 分离开来，通过注入的方式来使用，
 * 从而达到解耦的目的。
 */

/*
 * 类B想要使用类A的方法，B主动去实例化A，
 * 如果要是修改类A就可能会对类B造成影响。这样就会造成类A和类B产生很大的耦合。
 * 在这种情况下类A与类B想要解耦和，
 * 就可以使用该设计模式
 */
class A
{
    public function aDoSomething(){
        echo "类A所做的事情";
    }
}

class B
{
    protected $a;

    public function bDoSomething()
    {
        $this->a=new A();
        $this->a->aDoSomething();           //调用类A中的方法
    }

}
$b=new B();
$b->bDoSomething();


class A1
{
    public function aDoSomething(){
        echo "类A所做的事情";
    }
}

class B1
{
    protected $a;

    public function __construct(A1 $a)
    {
        $this->a=$a;
    }

    public function bDoSomething()
    {
        $this->a->aDoSomething();
    }

}
$b=new B1(new A1());
$b->bDoSomething();
/*
 * 上面这种方法，可以看出B不再主动去实例化A，而是先创建一个A的实例，
 * 将A注入到B的类中，A如果有改动，B则无需进行相应的修改。
 * 这就是依赖注入模式的一种实现。
 */