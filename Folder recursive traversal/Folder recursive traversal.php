<?php
/*
 * 使用递归完成文件的遍历
 * 思路是：
 * 使用scandir方法将传入路径的子文件以数组的方式获取得到
 * 遍历该数组，目的是将子文件的路径拼接起来，方便进行递归
 * 先进行文件夹判断，如果是文件夹才可以进行递归遍历
 * 再进行一个判断如果数组元素是‘.’或者‘..’
 * 使用continue因为不打算遍历隐藏文件
 * 打印路径
 * 递归当前路径
 * 如果不是文件夹直接进行打印
 */

$file="D:/soft_install";
function list_file($data){
    $temp=scandir($data);
    foreach ($temp as $v){
        $path=$data.'/'.$v;
        if (is_dir($path)){
            if ($v=='.'||$v=='..'){continue;}
            echo $path.'<br>';
            list_file($path);
        }else{
            echo $path.'<br>';
        }
    }
}
list_file($file);