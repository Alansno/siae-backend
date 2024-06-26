<?php


namespace App\Services;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\TeacherDegree;
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
        $teacher->status = "Pendiente";
        $teacher->image = "Lol";
        $teacher->user_id = $user->id;
        $teacher->save(); 

        $attach = new TeacherDegree();
        $attach->teacher_id = $teacher->id;
        $attach->degree_id = $data->degree_id;
        $attach->date_init = $data->date_init;
        $attach->date_end = $data->date_end;
        $attach->save();
        DB::commit();
        return true;

        //ASOCIAR ALUMNO Y DOCENTE A LAS LICENCIATURAS
     }catch(QueryException $e)
     {
        DB::rollBack();
     }
}

public function createRoom($data, $teacher_id, $subject_id){
  
   try{
      $betch = new Classroom();
      $betch->status = $data->status;
      $betch->capacity = $data->capacity;
      $betch->subject_id = $subject_id;
      $betch->teacher_id = $teacher_id;
      $betch->save();
      
      return true;

   }catch(QueryException $ex)
   {
      throw new \Exception($ex->getMessage());
   }
  
}

}