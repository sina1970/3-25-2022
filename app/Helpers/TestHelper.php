<?php
namespace App\Helpers;

class TestHelper{

    public static function saveData($phone){
        $file=fopen("testHelper.txt","a");
        fwrite($file,"$phone".PHP_EOL);
        fclose($file);
    }

}
