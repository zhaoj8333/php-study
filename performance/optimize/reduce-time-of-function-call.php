<?php

// reduce total times of function call
//
// $arr = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

// for ($i = 0; $i < count($arr); $i++) {
//     $x = 10031981 * $i;
// }

// execute progress
// 1. Initialize $i to 0, start our loop at index 0, check the length of the array using count(), increment $i by 1.
// 2. Once iteration 0 is complete, start at index 1, check the length of the array using count(), increment $i by 1.
// 3. Once iteration 1 is complete, start at index 2, check the length of the array using count(), increment $i by 1
//

// problems:
// 1. count() function is called too many times, it is unnecessary;
//

// optimize

// the fewer function calls made, the faster
//
// $arr = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

// $count = count($arr);

// for ($i = 0; $i < $count; $i++) {
//     $x = 10031981 * $i;
// }


//