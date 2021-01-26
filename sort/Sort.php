<?php
/*
 * 快速排序
 * 思想是设计2个块区，将数组分成小于基准数的数组和大于基准数的数组
 * 利用递归分治每层都处理一次left数组和right数组，直到递归出口，递归数组长度唯一的时候。
 * 这时就链接left和right数组
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
/*
 * 冒泡排序
 * 本质是大数下沉小数上浮
 * 遍历数组外层循环表示趟数
 * 里层循环表示两数比对，大数下沉，小数上浮
 */
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
echo '<br>';
/*
 * 插入排序
 * 思想是假设前面的数是排序好的，之后是把后面n个数插入到前面的数中
 * 就像斗地主插牌一样
 */
function insertSort($arr) {
    $len=count($arr);
    for($i=1;$i<$len; $i++){
        $tmp = $arr[$i];
    //内层循环控制，比较并插入
    for($j=$i-1;$j>=0;$j--) {
        if($tmp < $arr[$j]) {
            //发现插入的元素要大，交换位置，将后边的元素与前面的元素互换
            $arr[$j+1] = $arr[$j];
            $arr[$j] = $tmp;
        } else {
            //如果碰到不需要移动的元素，由于是已经排序好是数组，则前面的就不需要再次比较了。
            break;
        }
    }
    }
return $arr;
}
$a=[5,4,1,3,2];
insertSort($a);
var_dump($a);
echo '<br>';

/*
 * 选择排序
 * 在要排序的一组数中，选出最小的一个数与第一个位置的数交换。
 * 然后在剩下的数当中再找最小的与第二个位置的数交换，
 * 如此循环到倒数第二个数和最后一个数比较为止。
 */
function selectSort($arr){
    $len=count($arr);
    for ($i=0;$i<$len;$i++){
        $p=$i;
        for ($j=$i+1;$j<$len;$j++){
            if ($arr[$p]>$arr[$j]){
                $p=$j;
            }
        }
        if ($p!=$i){
            $tmp=$arr[$p];
            $arr[$p]=$arr[$i];
            $arr[$i]=$tmp;
        }
    }
    return $arr;
}
$a=[5,4,1,3,2];
insertSort($a);
var_dump($a);
echo '<br>';
/*
 * 归并排序
 * 归并排序将待排序的序列分成若干组，
 * 保证每一组都有序。
 * 然后进行合并排序，最后整个序列都有序
 */
function merge_sort(array $lists){
    $n=count($lists);
    if ($n<=1){
        return $lists;
    }
    $left=merge_sort(array_slice($lists,0,floor($n/2)));
    $right=merge_sort(array_slice($lists,floor($n/2)));
    $lists=merge($left,$right);
    return $lists;
}
function merge(array $left,array $right){
    $lists=[];
    $i=$j=0;
    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] < $right[$j]) {
            $lists[] = $left[$i];
            $i++;
        } else {
            $lists[] = $right[$j];
            $j++;
        }
    }
    $lists = array_merge($lists, array_slice($left, $i));
    $lists = array_merge($lists, array_slice($right, $j));
    return $lists;
}
$a=[5,4,1,3,2];
insertSort($a);
var_dump($a);
echo '<br>';