<?php

namespace App\Http\Controllers;

use App\Models\EditPatient;
use Illuminate\Http\Request;
use Exception;

class EditPatientController extends Controller
{
    public function updatePatient(Request $request)
    {
        try {
            $id = $request->patientID;
            $firstName = $request->firstName;
            $lastName = $request->lastName;
            $dateOfBirth = $request->dateOfBirth;
            $address = $request->address;
            $tel = $request->tel;
            $email = $request->email;
            $gender = $request->gender;
            $jmbg = $request->jmbg;
            $passportNum = $request->passportNum;

            $updatePatient = new EditPatient();
            $updatePatient->updatePatient($id, $firstName, $lastName, $dateOfBirth, $address, $tel, $email, $gender, $jmbg, $passportNum);

            return response()->json(['message' => 'Uspesno izmenjeni podaci o pacijentu.'], 200);

        } catch (Exception $ex) {
            return response()->json(['error' => 'Greska prilikom izmene podataka o pacijentu.'], 500);
        }
    }
}

