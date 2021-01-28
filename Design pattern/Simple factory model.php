<?php
/*
 * 定义一个抽象的类，让子类去继承实现它
 */
abstract class Operation{
    abstract public function getValue($num1,$num2);//强烈要求子类实现
}
//加法类
class OperationAdd extends Operation{
    public function getValue($num1, $num2)
    {
        return $num1+$num2;
    }
}
//减法类
class OperationSub extends Operation{
    public function getValue($num1, $num2)
    {
        return $num1-$num2;
    }
}
//乘法类
class OperationMul extends Operation{
    public function getValue($num1, $num2)
    {
        return $num1*$num2;
    }
}
//除法类
class OperationDiv extends Operation{
    public function getValue($num1, $num2)
    {
        try {
            if ($num2==0){
                throw new Exception('除数不能为0');
            }else{
                return $num1/$num2;
            }
        }catch (Exception $e){
            echo "错误信息".$e->getMessage();
        }
    }
}
//求余类
class OperationRem extends Operation{

    public function getValue($num1, $num2)
    {
        return $num1%$num2;
    }
}
/*
 * 现在还有一个问题未解决,
 * 就是如何让程序根据用户输入的操作符实例化相应的对象呢？
 * 解决办法：使用一个单独的类来实现实例化的过程，
 * 这个类就是工厂
 */

/*
 * 工程类，主要用来创建对象
 * 功能：根据输入的运算符号，工厂能实例化出合适的对象
 */
class Factory{
    public static function createObj($operate){
        switch($operate){
            case '+':   return new OperationAdd();
            break;
            case '-':   return new OperationSub();
            break;
            case '*':   return new OperationMul();
            break;
            case '/':   return new OperationDiv();
            break;
        }
    }
}
$test=Factory::createObj('/');
$result=$test->getValue(23,0);
echo $result;