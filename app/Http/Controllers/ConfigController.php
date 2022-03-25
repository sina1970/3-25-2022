<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
class ConfigController extends Controller
{
    //
    public function index(){
        $dbName= env('DB_DATABASE');
//        return $database;
        $new_db = DB::statement("CREATE DATABASE {$dbName}" );

        //Now migrate over all Company specific migrations

        if($new_db)
        {
            \Config::set('database.connections.company.database', $dbName);

            return Artisan::call( 'migrate', [
                '--database' => 'company',
                '--path' => 'database/migrations/company',
            ]);
        }

    }
}
