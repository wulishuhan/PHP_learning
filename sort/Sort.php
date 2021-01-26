<?php
/*
 * 快速排序
 */
function quickSort($arr){
    $len=count($arr);
    if ($len<=1){return $arr;}
    $pivot=$arr[0];
    $left=$right=array();
    $right=array();
    for ($i=1;$i<$len;$i++){
        if ($arr[$i]<$pivot){
            $left[]=$arr[$i];
        }else{
            $right[]=$arr[$i];
        }
    }
    $left=quickSort($left);
    $right=quickSort($right);
    return array_merge($left,array($pivot),$right);
}
$a=[5,4,1,3,2];
var_dump(quickSort($a));
echo '<br>';

function bubbleSort($arr){
    $len=count($arr);
    for ($i=1;$i<$len;$i++){
        for ($k=0;$k<$len-$i;$k++){
            if ($arr[$k]>$arr[$k+1]){
                $tmp=$arr[$k+1];
                $arr[$k+1]=$arr[$k];
                $arr[$k]=$tmp;
            }
        }
    }
    return $arr;
}
$a=[5,4,1,3,2];
bubbleSort($a);
var_dump($a);