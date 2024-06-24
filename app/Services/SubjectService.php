<?php

namespace App\Services;

use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class SubjectService{


    public function createSubject($data){

        try{
            $subject = new Subject();
            $subject->subject = $data->subject;
            $subject->credits = $data->credits;
            $subject->semester_id = $data->semester_id;
            $subject->save();
            return true;

        }catch(QueryException $ex){
            throw new \Exception($ex->getMessage()); 
        }

    }
}
