<?php

/**
 * 冒泡排序 PHP实现 
 * 原理：两两相邻比较，如果反序就交换，否则不交换
 * 时间复杂度：最好 O(n) 最坏 O(n2) 平均 O(n2)
 * 空间复杂度：O(1)
 * 什么时候使用：当所有的数据位于单向链表中 
 */

require_once __DIR__ . '/../uniqueRandom.php';
//效率差：“交换排序”
function bubbleSort(&$arr) : void
{
	for ($i = 0, $c = count($arr); $i < $c; $i++) {
		$swapped = false;
		for ($j = 0; $j < $c - 1; $j++) {
			if ($arr[$j + 1] < $arr[$j]) {
				list($arr[$j], $arr[$j + 1]) = array($arr[$j + 1], $arr[$j]);
				$swapped = true;
			}
		}

		if (!$swapped) break; //没有发生交换，算法结束
	}
}

$arr = uniqueRandom(1, 100000, 5000);
$start = microtime(true);
bubbleSort($arr);
$end = microtime(true);
$used = $end - $start;
echo "V1 used $used s" . PHP_EOL;
//V1 used 4.3315870761871 s

function bubbleSortV2(&$arr) : void
{
	for ($i = 0, $c = count($arr); $i < $c; $i++) {
		$swapped = false;
		for ($j = 0; $j < $c - $i - 1; $j++) {
			if ($arr[$j + 1] < $arr[$j]) {
				list($arr[$j], $arr[$j + 1]) = array($arr[$j + 1], $arr[$j]);
				$swapped = true;
			}

		}
		if (!$swapped) break; //没有发生交换，算法结束
	}
}

function bubbleSortV3(&$arr) : void
{
    $bound = count($arr) - 1;
	for ($i = 0, $c = count($arr); $i < $c; $i++) {
		$swapped = false;
		for ($j = 0; $j < $bound; $j++) {
			if ($arr[$j + 1] < $arr[$j]) {
				list($arr[$j], $arr[$j + 1]) = array($arr[$j + 1], $arr[$j]);
				$swapped = true;
				$newBound = $j;
			}
		}
		$bound = $newBound;
		if (!$swapped) break; //没有发生交换，算法结束
	}
}
//冒泡：是要往上冒，才算的上是冒泡排序
function bubbleSortV4(&$arr) : void
{
	$length = count( $arr );
	$swap = true;
	for( $outer = 0; $outer < $length && $swap; $outer++ ){
	  $swap = false;
	  // 当外部循环开始第一轮的时候，从倒数第一位开始往前对比，一直到与正数第一位比较完后终止
	  // 当外部循环开始第一轮的时候，从倒数第一位开始往前对比，一直到与正数第二位比较完后终止
	  for( $inner = $length - 1; $inner > $outer; $inner-- ){
	    if( $arr[ $inner ] < $arr[ $inner - 1 ] ){
	      $temp = $arr[ $inner ];
	      $arr[ $inner ] = $arr[ $inner - 1 ];
	      $arr[ $inner - 1 ] = $temp;
	      $swap = true;
	    }
	  }
	}
}




$arr = uniqueRandom(1, 100000, 5000);
$start = microtime(true);
bubbleSortV2($arr);
$end = microtime(true);
$used = $end - $start;
echo "V2 used $used s" . PHP_EOL;
//V2 used 2.4826340675354 s

$arr = uniqueRandom(1, 100000, 5000);
$start = microtime(true);
asort($arr);
$end = microtime(true);
$used = $end - $start;
echo "asort() used $used s" . PHP_EOL;
//asort() used 0.00070095062255859 s
