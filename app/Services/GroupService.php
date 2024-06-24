<?php

namespace App\Services;


use App\Models\Group;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class GroupService{

    public function createGroup($data){

        try{

            $group = new Group();
            $group->group = $data->group;
            $group->save();   
            return true;

        }catch(QueryException $ex){
        
            throw new \Exception($ex->getMessage()); 
        }


    }

}