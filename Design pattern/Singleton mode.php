<?php
class singleton{
    /*
     * 单例模式
     * $_instance必须声明为静态私有变量
     * 构造函数必须声明为私有
     * getInstance（）方法必须设置为公有
     */

    private static $_instance;
    /**
     * singleton constructor.
     */
    private function __construct()
    {
        echo '创建1个实例';
    }
    public static function get_instance(){
        var_dump(isset(self::$_instance));
        if (!isset(self::$_instance)){
            self::$_instance=new self();
        }
        return self::$_instance;
    }
    private function _clone(){
        trigger_error('Clone is not allow',E_USER_ERROR);
    }
    function test(){
        echo "test";
    }
}
//报错$test=new singleton();
$test=singleton::get_instance();
var_dump($test);
$test=singleton::get_instance();
var_dump($test);
$test->test();
//报错$test_clone=clone $test;