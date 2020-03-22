<?php
#!/usr/local/bin/php
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');
require_once dirname(__FILE__) . '/../app/bootstrap.php';
if (count($argv) < 2) {
    call_user_func('usage');
}
if ($argv[1] == 'ws') {
    App::getInstance();
} elseif ($argv[1] == 'reload') {
    //平滑重启服务,待完成
    shell_exec(' echo "Reloading..." \ cmd=$(pidof reload_master) \ kill -USR1 "$cmd" echo "Reloaded"');
} elseif ($argv[1] == 'stop') {
    //停止服务,待完成,如何优雅停止???
    shell_exec('kill -15 主进程PID');
} else {
    call_user_func('usage');
}

/**
 * usage
 * @return mixed
 */
function usage()
{
    exit('Usage: server.php [ws|tcp] [reload|stop] [port]' . PHP_EOL);
}
