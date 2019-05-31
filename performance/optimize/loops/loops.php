<?php

// foreach .. for .. while ?
// foreach > for .. while

// foreach is the fastest approach
//
// for
//  循环数字数组时,for需要事先count($arr)计算数组长度,需要引入自增变量$i,
//  每次循环都要进行条件判断$i<$c,然后自增$i++,输出数组元素时,$arr[$i]需要进行哈希操作
//
// foreach
//  而foreach循环数组时,指针会自动指向下一个元素,不需要计算数组长度,
//  没有条件判断和自增变量,调用元素时也没有哈希操作,所以性能肯定要比for和while高