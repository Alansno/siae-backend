<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDegreeRequest;
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
            return Response::sendResponse($degree,'Licenciatura creada correctamente', 201);
            
        } catch (QueryException $ex) {
            throw new \Exception($ex->getMessage());
        }
        catch (\Exception $ex) {
        throw new InternalErrorException("Algo salio mal");
        }
    }
}
