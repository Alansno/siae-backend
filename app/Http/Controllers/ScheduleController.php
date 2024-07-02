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
        try {
            $schedule = $this->scheduleService->createSchedule($request);
            return Response::sendResponse(true, $schedule, 'Horario creado', 201);
        } catch (\PDOException $ex) {
            return response()->json($ex->getMessage(), 500);
        }
        catch (\Exception $ex) 
        {
            return response()->json($ex->getMessage(), 500);
        }
    }
}
