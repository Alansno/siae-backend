<?php

namespace App\Services;

use App\Models\Schedule;

use Illuminate\Database\QueryException;
use Carbon\Carbon;

class ScheduleService{

public function createSchedule($request){
    try{
        $dateString = $request['date_class_init'];
        $dateString2 = $request['date_class_end'];
        $timezone = $request['timezone'];

        // Crear un objeto Carbon en la zona horaria proporcionada
        $date = Carbon::createFromFormat('Y-m-d\TH:i', $dateString, $timezone);
        $date2 = Carbon::createFromFormat('Y-m-d\TH:i', $dateString2, $timezone);

        // Convertir la fecha y hora a UTC
        $date->setTimezone('UTC');
        $date2->setTimezone('UTC');

        $schedule = new Schedule();
        $schedule->date_class_init = $date;
        $schedule->date_class_end = $date2;
        $schedule->save();
        return true;


    }catch(QueryException $ex){

        throw new \Exception($ex->getMessage());    
    }

}

}