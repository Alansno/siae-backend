<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Services\SubjectService;
use Illuminate\Database\QueryException;
use App\Models\Response;


class SubjectController extends Controller
{
    private SubjectService $subjectService;

    public function __construct(SubjectService $subjectService){

        $this->subjectService = $subjectService;
    }

    public function create(SubjectRequest $request){

        try{
            $subject = $this->subjectService->createSubject($request);
            return Response::sendResponse(true, $subject, "Creando Materia",201);
        }catch(QueryException $e){
            throw new \Exception("PENDEJO");
        }
    }

}
