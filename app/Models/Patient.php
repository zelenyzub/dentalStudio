<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class Patient extends Model
{
    use HasFactory;

    public function saveNewPatient(
        $dateOfBirth,
        $firstName,
        $lastName,
        $address,
        $tel,
        $jmbg,
        $passportNum,
        $email,
        $gender,
        $user_id,
        $illnessHistory
    ) {
        $data = [
            'date_of_birth' => $dateOfBirth ? Carbon::parse($dateOfBirth)->toDateString() : null,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'address' => $address,
            'tel' => $tel,
            'email' => $email,
            'gender' => $gender,
            'user_id' => $user_id,
            'illness_history' => $illnessHistory,
        ];
        if ($jmbg) {
            $data['jmbg'] = $jmbg;
            $data['passportNum'] = null;
        } elseif ($passportNum) {
            $data['passportNum'] = $passportNum;
            $data['jmbg'] = null;
        }

        $query = DB::table('patients')
            ->insertGetId($data);
        return $query;
    }

    public function patientData($request, $id)
    {
        $start = isset($request['start']) ? $request['start'] : 0;
        $length = isset($request['length']) ? $request['length'] : 0;
        $sort = 'examinations.id';
        $sorting = 'asc';
        $search = isset($request['search']['value']) ? $request['search']['value'] : 0;

        if (isset($request['order'][0]['column'])) {
            switch ($request['order'][0]['column']) {
                case '0':
                    $sort = 'examinations.id';
                    break;
                case '1':
                    $sort = 'examinations.examination_date';
                    break;
            }
        }

        $getRecord = DB::table('examinations')
            ->select('examinations.id', 'examinations.examination_date', 'examinations.description', )
            ->where('examinations.soft_delete', '!=', 0)
            ->where('examinations.patient_id', $id)
            ->orderBy($sort, $sorting);

        if (!empty($search)) {
            $getRecord = $getRecord->whereRaw("examinations.description LIKE '%{$search}%'");
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

    public function deleteExamination($id)
    {
        DB::table('examinations')
            ->where('id', $id)
            ->update(['soft_delete' => 0]);
    }

    public function saveNewExamination($id, $user_id, $examinationDate, $examinationDescription)
    {
        $data = [
            'patient_id' => $id,
            'user_id' => $user_id,
            'examination_date' => $examinationDate ? Carbon::parse($examinationDate)->toDateString() : null,
            'description' => $examinationDescription,
        ];

        $query = DB::table('examinations')
            ->insertGetId($data);
        return $query;
    }

    public function getExaminationData($id) {
        $query = DB::table('examinations')
                ->select('examinations.examination_date', 'examinations.description')
                ->where('id', $id)
                ->first();
        return $query;
    }

    public function updateExamination($id, $examinationDate, $examinationDescription) {
        $updateData = [
            'examination_date' => $examinationDate ? Carbon::parse($examinationDate)->toDateString() : null,
            'description' => $examinationDescription,
        ];

        return DB::table('examinations')
            ->where('id', $id)
            ->update($updateData);        
    }
}
