<?php
namespace Lee2son\Swoolaravel\Console\Commands;

use Illuminate\Console\Command;

class Server extends Command
{
    protected $signature = 'swoolaravel:server {type}';

    protected $description = '服务管理';

    public function handle()
    {
        $method = 'on' . ucfirst($this->argument('type'));
        if(method_exists($this, $method)) {
            $this->$method();
        }
    }

    public function onStart()
    {
        $server = app('swoolaravel.server');
        $server->start();
    }
//
//    public function onStop()
//    {
//        $pid = file_get_contents(config('webserver.pid_file'));
//        if($pid) {
//            system("kill -TERM {$pid}");
//        }
//    }
//
//    public function onReload()
//    {
//        $pid = file_get_contents(config('webserver.pid_file'));
//        if($pid) {
//            system("kill -USR1 {$pid}");
//        }
//    }
}