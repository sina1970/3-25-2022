<?php
namespace App\Helpers;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Support\Facades\DB;

class DatabaseMaker
{
    public static function initDb($dbName): ConnectionInterface
    {
        $oldConf = config()->get('database.connections.mysql');
        $oldConf['database'] = '';
        config(['database.connections.onthefly' => $oldConf]);
        $connection = DB::connection('onthefly');
        $isSuccessful = $connection->statement("CREATE DATABASE IF NOT EXISTS {$dbName}");
        $oldConf['database'] = $dbName;
        config(["database.connections.{$dbName}" => $oldConf]);
        return DB::connection($dbName);
    }

    public static function setEnvironmentValue($envDbUsernameKey , $envDbUsernameValue, $envDbPasswordKey , $envDbPasswordValue)
    {
//        $envFile = app()->environmentFilePath();
////        dd($envFile);
//        $str = file_get_contents($envFile);
////        dd($str);
//
//        $oldValue = strtok($str, "{$envKey}=");
//        dd($oldValue);
//        $str = str_replace("{$envKey}={$oldValue}", "{$envKey}={$envValue}\n", $str);
//
//        $fp = fopen($envFile, 'w');
//        fwrite($fp, $str);
//        fclose($fp);


        ######################################################
        $path = app()->environmentFilePath();

        $escaped = preg_quote('='.env($envDbUsernameKey), '/');

        file_put_contents($path, preg_replace(
            "/^{$envDbUsernameKey}{$escaped}/m",
            "{$envDbUsernameKey}={$envDbUsernameValue}",
            file_get_contents($path)
        ));

        $escaped = preg_quote('='.env($envDbPasswordKey), '/');

        file_put_contents($path, preg_replace(
            "/^{$envDbPasswordKey}{$escaped}/m",
            "{$envDbPasswordKey}={$envDbPasswordValue}",
            file_get_contents($path)
        ));

    }
}

##########################


namespace App\Http\Controllers;

use App\Helpers\DatabaseConnection;
use App\Helpers\DatabaseMaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use App;
use JetBrains\PhpStorm\NoReturn;



