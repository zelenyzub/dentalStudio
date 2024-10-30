<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class EditPatient extends Model
{
    public function updatePatient($id, $firstName, $lastName, $dateOfBirth, $address, $tel, $email, $gender, $jmbg = null, $passportNum = null) {
        $updateData = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'date_of_birth' => $dateOfBirth ? Carbon::parse($dateOfBirth)->toDateString() : null,
            'address' => $address,
            'tel' => $tel,
            'email' => $email,
            'gender' => $gender,
        ];

        if ($jmbg) {
            $updateData['jmbg'] = $jmbg;
            $updateData['passportNum'] = null; 
        } elseif ($passportNum) {
            $updateData['passportNum'] = $passportNum;
            $updateData['jmbg'] = null; 
        }

        return DB::table('patients')
            ->where('id', $id)
            ->update($updateData);        
    }
}

