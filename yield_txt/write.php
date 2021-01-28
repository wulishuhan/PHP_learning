<?php

/*
 * 读取一个超大文本文件
 * 使用普通方法读取花费时间长，效率低下
 * 使用生成器读取效率高，
 * 原因是其读取并非是一次性将文本全部读取进入内存
 * 而是分次数读取
 * */
function createtxt(){
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "Bill Gates\n";
for ($i=0;$i<100000;$i++){
fwrite($myfile, $txt);
}
fclose($myfile);
}

function before(){
echo memory_get_usage() . '<br>';
file_get_contents("newfile.txt");
echo memory_get_usage() . '<br>';
}
function after(){
echo memory_get_usage() . '<br>';
function readTxt(){
    $handle = fopen("newfile.txt", 'rb');
    while (feof($handle) === false) {
        yield fgets($handle);
    }
    fclose($handle);
}
foreach (readTxt() as $value) {
     $va=$value."";
}
echo memory_get_usage() . '<br>';
}
createtxt();
before();
after();