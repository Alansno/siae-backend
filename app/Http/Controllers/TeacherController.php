<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoomRequest;
use App\Http\Requests\CreateStudyRequest;
use App\Http\Requests\CreateTeacherRequest;
use App\Models\Response;
use App\Services\TeacherService;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    private TeacherService $teacherService;
  

    public function __construct(TeacherService $teacherService){ 

        $this->teacherService = $teacherService;
   
    }

    public function create(CreateTeacherRequest $request){

        try{
            $teacher = $this->teacherService->createTeacher($request);
            return Response::sendResponse(true,$teacher, "Docente Creado",201);
        }catch(QueryException $ex){
            throw new \Exception($ex = "Error Processing Request", 1);  
        }catch(\Exception $ex){
           
            return response()->json($ex->getMessage(), 500);
        }
    }
//--------------------------------------
public function room(CreateRoomRequest $request){
try{
    $betch = $this->teacherService->createRoom($request, $request->teacher_id, $request->subject_id);
    return Response::sendResponse(true,$betch,"Salon Creado",201);
}catch(QueryException $ex){
    throw new \Exception($ex = "Error Processing Request", 1);  
}catch(\Exception $ex){
   
    return response()->json($ex->getMessage(), 500);
}
}

    public function studyTeacher(CreateStudyRequest $request)
    {
        $user = Auth::id();
        try {
            $study = $this->teacherService->studyTeacher($request, $user);
            if ($study == false) return Response::sendResponse(false, $study, 'El docente no existe', 404);

            return Response::sendResponse(true, $study, 'Estudio asignado correctamente', 201);
        } catch (\PDOException $ex) {
            return response()->json($ex->getMessage(), 500);
        }
        catch (\Exception $ex) 
        {
            return response()->json($ex->getMessage(), 500);
        }
    }
   
}
