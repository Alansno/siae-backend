<?php

namespace App\Http\Controllers;

use App\Http\Requests\SemesterRequest;
use App\Models\Response;
use App\Services\SemesterService;
use Illuminate\Database\QueryException;


class SemesterController extends Controller
{
    private SemesterService $semesterService;

    public function __construct(SemesterService $semesterService){

        $this->semesterService = $semesterService;

    }


    public function create(SemesterRequest $request){

        try{

            $semester = $this->semesterService->createSemester($request);
            return Response::sendResponse($semester, "Creado Semestre",201);//status - 201 OK

        }catch(QueryException $e){
            throw new \Exception($e->getMessage());
        }
        catch(\Exception $e){
            throw new \Exception("Pendejo");
        }        
    }



}
