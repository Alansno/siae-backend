<?php

namespace App\Services;

use App\Models\Semester;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class SemesterService{

public function createSemester($data){

    try{

        $semester = new Semester();
        $semester->semester = $data->semester;
        $semester->save();
        return true;


    }catch(QueryException $ex){

        throw new \Exception($ex->getMessage());    
    }

}

}