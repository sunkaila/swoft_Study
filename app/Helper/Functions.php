<?php
/**
 * Custom global functions
 */

function user_func(): string
{
    return 'hello';
}


/**
 * debug输入函数，输出的信息在swoole.log里面，方便调试
 */
if (! function_exists('xe_debug')) {
    function xe_debug()
    {
        $args = func_get_args();

        if (PHP_SAPI !== 'cli') echo '<pre>';

        $datetime = xe_getDateTime();

        echo PHP_EOL . '---------- debug print begin ----------' . PHP_EOL . PHP_EOL;

        foreach ($args as $v) {
            if(! $v){
                var_dump($v);
            } else {
                print_r($v);
            }
            echo PHP_EOL;
        }

        echo PHP_EOL . '---------------------------------------' . PHP_EOL;

        $trace = current(debug_backtrace());

        echo "FILE  : {$trace['file']}" . PHP_EOL;
        echo "LINE  : {$trace['line']}" . PHP_EOL;
        echo "TIME  : {$datetime}" . PHP_EOL;

        echo '---------- debug print end   ----------' . PHP_EOL . PHP_EOL;

        if (PHP_SAPI !== 'cli') echo '</pre>';
    }
}


// 时间戳转换 Y-m-d H:i:s
if(!function_exists("xe_getDateTime")){
    function xe_getDateTime($time = null){
        if(! $time){
            $time = time();
        }
        return date('Y-m-d H:i:s', $time);
    }
}
