<?php

namespace App\Services;
use App\Models\Degree;
use App\Models\DegreeSubject;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class DegreeService {

    public function createDegree($data): bool
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

    public function degreeSubjects($data): bool
    {
        try {

            $hasSubject = DegreeSubject::where('degree_id', $data->degree_id)->where('subject_id', $data->subject_id)->first();

            if ($hasSubject) throw new InvalidArgumentException('La materia ya fue asociada en la licenciatura');

            $degreeSub = new DegreeSubject();
            $degreeSub->degree_id = $data->degree_id;
            $degreeSub->subject_id = $data->subject_id;
            $degreeSub->save();

            return true;
        } catch (QueryException $ex) {
            throw new \Exception($ex->getMessage());
        }
    }
}