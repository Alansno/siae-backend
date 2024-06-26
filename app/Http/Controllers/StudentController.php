<?php
declare(strict_types=1);
namespace App\Http\Controllers;
use App\Http\Requests\CreateStudentRequest;
use App\Models\Response;
use App\Services\StudentService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Exception\InternalErrorException;

class StudentController extends Controller
{
    private StudentService $studentService;

    public function __construct(StudentService $studentService) {
        $this->studentService = $studentService;
    }

    public function create(CreateStudentRequest $request)
    {
        try {
           $student = $this->studentService->createStudent($request);
            return Response::sendResponse(true, $student, 'Estudiante registrado', 201);
        } catch (QueryException $ex) {
            throw new \Exception($ex->getMessage());
        }
        catch (\Exception $ex) {
            return response()->json("Algo salio mal", 500);
        }
    }
}
