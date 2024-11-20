<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
class AddPatientController extends Controller
{
    public function saveNewPatient(Request $request)
    {
        try {
            $dateOfBirth = $request->dateOfBirth;
            $firstName = $request->firstName;
            $lastName = $request->lastName;
            $address = $request->address;
            $tel = $request->tel;
            $jmbg = $request->jmbg;
            $passportNum = $request->passportNum;
            $email = $request->email;
            $gender = $request->gender;
            $user_id = Auth::user()->id;

            $request->validate([
                'files.*' => 'file|max:102400', // Ensure each item is a file with a max size of 2MB
            ]);
            
            $filePaths = [];
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $path = $file->store('illness_history'); // Store files in 'storage/app/illness_history'
                    $filePaths[] = $path; // Save the path for the database entry
                }
            }
            $illnessHistory = implode(',', $filePaths);

            $query = new Patient();
            $addPatient = $query->saveNewPatient(
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
                $illnessHistory,
            );
            return json_encode($addPatient, 200);
        } catch (Exception $ex) {
            dd($ex->getMessage());
            return response() - json_encode(['error' => 'Greska prilikom dodavanja novog pacijenta.'], 500);
        }
    }
}
