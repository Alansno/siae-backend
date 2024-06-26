<?php
declare(strict_types=1);
namespace App\Services;
use App\Models\Student;
use App\Models\StudentDegree;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentService {

    public function createStudent($data): bool
    {
        DB::beginTransaction();
        try {
            $user = new User();
            $user->email = $data->email;
            $user->role = $data->role;
            $user->password = Hash::make($data->password);
            $user->save();

            $student = new Student();
            $student->name = $data->name;
            $student->date_birth = $data->date_birth;
            $student->phone_student = $data->phone_student;
            $student->address_student = $data->address_student;
            $student->status = "Pendiente";
            $student->image = "jajauuxw.png";
            $student->user_id = $user->id;
            $student->save();

            $attach = new StudentDegree();
            $attach->student_id = $student->id;
            $attach->degree_id = $data->degree_id;
            $attach->semester_id = $data->semester_id;
            $attach->group_id = $data->group_id;
            $attach->date_init = $data->date_init;
            $attach->date_end = $data->date_end;
            $attach->save();

            DB::commit();
            return true;

        } catch (QueryException $ex) {
            DB::rollBack();
            throw new \Exception($ex->getMessage());
        }
    }
}