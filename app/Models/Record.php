<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Record extends Model
{
    use HasFactory;

    public function recordTable($request)
    {
        $start = isset($request['start']) ? $request['start'] : 0;
        $length = isset($request['length']) ? $request['length'] : 0;
        $sort = 'patients.id';
        $sorting = 'asc';
        $search = isset($request['search']['value']) ? $request['search']['value'] : 0;

        if (isset($request['order'][0]['column'])) {
            switch ($request['order'][0]['column']) {
                case '0':
                    $sort = 'patients.id';
                    break;
                case '1':
                    $sort = 'patients.first_name';
                    break;
                case '2':
                    $sort = 'patients.last_name';
                    break;
            }
        }

        $getRecord = DB::table('patients')
            ->select('patients.id', 'patients.first_name', 'patients.last_name', 'patients.date_of_birth', 'patients.address', 'patients.tel', 'patients.jmbg', 'patients.passportNum', 'patients.email', 'patients.gender')
            ->where('patients.soft_delete', '!=', 0)
            ->orderBy($sort, $sorting);

        if (!empty($search)) {
            $getRecord = $getRecord->whereRaw("patients.first_name LIKE '%{$search}%' OR patients.last_name LIKE '%{$search}%'");
        }
        $recordsFiltered = $getRecord->count();
        $recordsTotal = $getRecord->offset($start)->limit($length)->get();
        $data = $getRecord->get();
        return [
            'recordsFiltered' => $recordsFiltered,
            'recordsTotal' => $recordsTotal,
            'data' => $data,
        ];
    }

    public function patientData($id) {
        $query = DB::table('patients')
            ->where('id', $id)
            ->first(); 
    
        if ($query) {
            $query->illness_history = explode(',', $query->illness_history); 
        }
    
        return $query;
    }
    

    public function deleteRecord($id) {
        DB::table('patients')
            ->where('id', $id)
            ->update(['soft_delete' => 0]);
    }
}