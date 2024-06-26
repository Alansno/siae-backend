<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Services\GroupService;
use Illuminate\Database\QueryException;
use App\Http\Requests\GroupRequest;

class GroupController extends Controller
{
 private GroupService $groupService;

    public function __construct(GroupService $groupService){

        $this->groupService = $groupService;
    }


    public function create(GroupRequest $request){

        try{

            $group = $this->groupService->createGroup($request);
            return Response::sendResponse(true, $group, "Creado Grupo",201);//status - 201 OK

        }catch(QueryException $e){
            throw new \Exception($e->getMessage());
        }
        catch(\Exception $e){
            throw new \Exception("Pendejo");
        }        
    }
}
