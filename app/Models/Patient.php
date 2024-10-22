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
            'first_name' =>$firstName,
            'last_name' =>$lastName,
            'address' =>$address,
            'tel' =>$tel,
            'jmbg' =>$jmbg,
            'passportNum' =>$passportNum,
            'email' =>$email,
            'gender' =>$gender,
            'user_id' =>$user_id,
            'illness_history' =>$illnessHistory,
        ];

        $query = DB::table('patients')
            ->insertGetId($data);
        return $query;
    }
}
