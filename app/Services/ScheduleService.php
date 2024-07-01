<?php

namespace App\Services;

use App\Models\Schedule;

use Illuminate\Database\QueryException;

class ScheduleService{

public function createSchedule($utcDateTimeInit, $utcDateTimeEnd){

    try{

        $schedule = new Schedule();
        $schedule->date_class_init = $utcDateTimeInit;
        $schedule->date_class_end = $utcDateTimeEnd;
        $schedule->save();
        return true;


    }catch(QueryException $ex){

        throw new \Exception($ex->getMessage());    
    }

}

}