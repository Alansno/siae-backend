<?php


namespace App\Services;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class TeacherService{

public function createTeacher($data)
{
DB::beginTransaction();
    try{   

        $user = new User();
        $user->email = $data->email;
        $user->role = $data->role;    
        $user->password = Hash::make($data->password);
        $user->save();


        $teacher = new Teacher();
        $teacher->name = $data->name;
        $teacher->date_birth = $data->date_birth;
        $teacher->teacher_phone = $data->teacher_phone;
        $teacher->teacher_address = $data->teacher_address;
        $teacher->status = $data-> status;
        $teacher->image = $data->image;
        $teacher->save(); 

        //ASOCIAR ALUMNO Y DOCENTE A LAS LICENCIATURAS

        


     }catch(QueryException $e)
     {
        DB::rollBack();
     }

    

}
}