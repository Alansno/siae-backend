<?php

namespace App\Services;
use App\Models\Degree;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class DegreeService {

    public function createDegree($data)
    {
        try {
            $degree = new Degree();
            $degree->name_degree = $data->name_degree;
            $degree->date_validate_init = $data->date_validate_init;
            $degree->date_validate_end = $data->date_validate_end;
            $degree->save();

            return true;
        } catch (QueryException $ex) {
            throw new \Exception($ex->getMessage());
        }
    }
}