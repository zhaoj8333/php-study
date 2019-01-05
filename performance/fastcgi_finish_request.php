<?php

echo 'fastcgi_finish_request', "<br />" , php_sapi_name();

fastcgi_finish_request();

// fastcgi_finish_request后,客户端响应就已经结束,浏览时没有被堵塞,程序却都执行了,具体看日志
// 
// ,Yahoo在Best Practices for Speeding Up Your Web Site中提到了Flush the Buffer Early,
// 也就是利用PHP中的flush方法把内容尽快发到客户端去,它和本文介绍的fastcgi_finish_request有些许的类似.

echo 1231321321;

for ($i = 0; $i < 10; $i++) {
    sleep(2);
    file_put_contents('/tmp/php/' . time() . '.log', time() . ': data');
}
