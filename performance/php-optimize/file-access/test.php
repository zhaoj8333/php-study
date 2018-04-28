<?php

// fread()
// file_get_contents(): return string, memory mapping,
//  it has more performance when read small files
// readfile()
//
// file(): return array, each line of file is an element
//
//

// for small files: fread() has 70 percent performance improvement
// for big files: file_get_contets is better