<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Models\Response;
use App\Services\ScheduleService;
use Illuminate\Database\QueryException;


class ScheduleController extends Controller
{
    private ScheduleService $scheduleService;

    public function __construct(ScheduleService $scheduleService){

        $this->scheduleService = $scheduleService;
    }

    public function create(ScheduleRequest $request){
        
        try{
        $localDateTimeInit = $request->input('date_class_init');
        $localDateTimeEnd = $request->input('date_class_end');

        $dateTimeInit = \Carbon\Carbon::parse($localDateTimeInit);
        $dateTimeEnd =  \Carbon\Carbon::parse($localDateTimeEnd);

        
        $utcDateTimeInit = $dateTimeInit->setTimezone('UTC');
        $utcDateTimeEnd = $dateTimeEnd->setTimezone('UTC');


        $scheduleService=$this->scheduleService->createSchedule($utcDateTimeInit, $utcDateTimeEnd);

        return Response::sendResponse(true,$scheduleService, "Horario Creado",201);

        }catch(QueryException $ex){
            throw new \Exception($ex = "Error Processing Request", 1);  
        }catch(\Exception $ex){
           
            return response()->json($ex->getMessage(), 500);
        }


    }


    

}
