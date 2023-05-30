<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

/*Artisan::command('OUIimport', function() {
    $requestUrl = "http://standards-oui.ieee.org/oui/oui.csv";
    $row = 1;
    if (($handle = fopen($requestUrl, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            echo $num;
            $row++;
            for ($c=0; $c < $num; $c++) {
                //echo $data[$c];
            }
        }
        fclose($handle);
    }
})->purpose('Imports the latest version of the IEEE OUI data into a database');*/
