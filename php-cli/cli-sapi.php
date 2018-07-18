<?php

/**
•    No HTTP headers are written to the output by default. This makes sense because
they hold no meaning in the command line and so would be just extraneous text
printed before your genuine output. If your output will later be funneled out to a web
browser, you will need to manually add any necessary headers (for instance, by using
the echo() PHP function to manually output the header text).
•    PHP does not change the working directory to that of the PHP script being executed.
To do this manually, use getcwd() and chdir() to get and set the current directory,
respectively. Otherwise, the current working directory will be that from which you
invoked the script. For instance, if you are currently in /home/rob and you type php /
home/peter/some_script.php, the working directory used in PHP will be /home/rob,
not /home/peter.
•    Any error or warning messages are output in plain text, rather than HTML-formatted
text. If you want HTMLified errors if, for instance, you are producing static HTML
files, you can override this by setting the html_errors runtime configuration
directive to true in your script by using ini_set('html_errors', 1);.
•    PHP implicitly “flushes” all output immediately and doesn’t buffer by default. Online
performance can often be harmed by sending output straight to a browser, so instead
output is buffered and sent in optimal-sized chunks when each chunk is full. Offline,
this is not likely to be an issue, so blocks of HTML and other output from constructs
such as print and echo are sent to the shell straightaway. There is no need to use
flush() to clear a buffer when you are waiting for further output. You can still use
PHP’s output buffering functions to capture and control output if you want; see the
“Output Control Functions” section in the PHP manual for more information.
Chapter 3 ■ Understanding the CLi sapi, and Why yoU need to
14
•    There is no execution time limit set. Your script will run continuously until it exits of
its own volition; PHP will not terminate it even if it hangs. If you want to set a time
limit to rein in misbehaving scripts, you can do so from within the script by using the
set_time_limit() function.
•    The variables $argc and $argv, which describe any command-line arguments
passed to your script, are automatically set. These are discussed fully later in this
chapter.
•    PHP defines the constants STDIN, STDOUT, and STDERR, relating to the standard
streams of the same name, and automatically opens input/output (I/O) streams
for them. These give your application instant access to standard input (STDIN),
standard output (STDOUT), and standard error (STDERR) streams.
*/
