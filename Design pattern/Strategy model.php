<?php
/*
 * 在策略模式（Strategy Pattern）中，
 * 一个类的行为或其算法可以在运行时更改
 * 使用场景：
 * 1、如果在一个系统里面有许多类，它们之间的区别仅在于它们的行为，
 * 那么使用策略模式可以动态地让一个对象在许多行为中选择一种行为。
 * 2、一个系统需要动态地在几种算法中选择一种。
 * 3、如果一个对象有很多的行为，如果不用恰当的模式，这些行为就只好使用多重的条件选择语句来实现。
 * 主要是父类接口指向子类实现类
 */
interface UserStrategy{
    function showAd();
    function showCategory();
}
class FemaleUser implements UserStrategy{
    function showAd()
    {
       echo '2021冬季女装';
    }

    function showCategory()
    {
       echo '女装';
    }
}
class MaleUser implements UserStrategy{
    function showAd()
    {
        echo 'IPhone12';
    }

    function showCategory()
    {
        echo '电子产品';
    }
}
class Page{
    protected $strategy;
    function index(){
        echo 'AD:';
        $this->strategy->showAd();
        echo '<br>';
        echo 'Category:';
        $this->strategy->showCategory();
        echo '<br>';
    }
    function setStrategy(UserStrategy $strategy){
        $this->strategy=$strategy;
    }
}
$page=new Page();
if (isset($_GET['male'])){
    $strategy=new MaleUser();
}else{
    $strategy=new FemaleUser();
}
$page->setStrategy($strategy);
$page->index();