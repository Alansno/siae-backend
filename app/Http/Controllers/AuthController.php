<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\Response;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function authenticate(AuthRequest $request)
    {
        try {
            $token = $this->authService->login($request);
            return Response::sendResponse(true, $token, 'Usuario autenticado', 200);
        }
        catch (UnauthorizedException $ex) {
            return Response::sendResponse(false, $ex->getMessage(),'', 401);
        }
        catch (QueryException $ex) {
            return response()->json($ex->getMessage());
        }
        catch (\Exception $ex) {
            return response()->json("Algo salio mal");
        }
    }

    public function logout()
    {
        $this->authService->logout();
        return Response::sendResponse(true, '', 'Sesión cerrada', 200);
    }

    public function users()
    {
        $user = User::all();
        return response()->json($user);
    }
}
