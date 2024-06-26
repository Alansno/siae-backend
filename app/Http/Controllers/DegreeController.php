<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDegreeRequest;
use App\Http\Requests\CreateSubjectAssociate;
use App\Models\Response;
use App\Services\DegreeService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Exception\InternalErrorException;

class DegreeController extends Controller
{
    private DegreeService $degreeService;
    public function __construct(DegreeService $degreeService)
    {
        $this->degreeService = $degreeService;
    }

    public function create(CreateDegreeRequest $request)
    {
        try {
            $degree = $this->degreeService->createDegree($request);
            return Response::sendResponse(true, $degree,'Licenciatura creada correctamente', 201);
            
        } catch (QueryException $ex) {
            throw new \Exception($ex->getMessage());
        }
        catch (\Exception $ex) {
        throw new InternalErrorException("Algo salio mal");
        }
    }

    public function subjectAssociate(CreateSubjectAssociate $request)
    {
        try {
            $subjectAss = $this->degreeService->degreeSubjects($request);
            return Response::sendResponse(true, $subjectAss, 'Materia asociada a la carrera', 201);
        }
        catch (\InvalidArgumentException $ex) {
            return Response::sendResponse(false, $ex->getMessage(),'', 409);
        }
        catch (QueryException $ex) {
            return response()->json($ex->getMessage());
        }
        catch (\Exception $ex) {
            return response()->json("Algo salio mal");
        }
    }
}
