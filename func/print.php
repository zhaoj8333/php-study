<?php

// print不是函数
//

// var_dump(print("1\n"));

if (print("1\n") && print("2\n") && print("3\n") && print("4\n")) {
    ;
}

if (print("1\n" && print("2\n" && print("3\n" && print("4\n"))))) {
    ;
}

if ((print("1\n")) && (print("2\n")) && (print("3\n")) && (print("4\n"))) {
    ;
}
