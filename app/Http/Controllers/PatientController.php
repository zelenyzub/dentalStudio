<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
class PatientController extends Controller
{
    public function patient($id)
    {
        return view('pacijent', compact('id'));
    }

    public function patientTable(Request $request)
    {
        try {
            $id = $request->id;
            $getExamination = new Patient();
            $modelData = $getExamination->patientData($request, $id);

            $data['draw'] = $request->input('draw');
            $data['recordsFiltered'] = $modelData['recordsFiltered'];
            $data['recordsTotal'] = count($modelData['recordsTotal']);
            $data['data'] = $modelData['data'];

            return json_encode($data, 200);
        } catch (Exception $ex) {
            return response() - json_encode(['error' => 'Greska prilikom ucitavanja tabele pregleda.'], 500);
        }
    }

    public function deleteExamination(Request $request)
    {
        try {
            $id = $request->examinationID;
            $deleteExamination = new Patient();
            $deleteExamination->deleteExamination($id);

            return response()->json(['message' => 'Uspesno obrisan pregled'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Greška prilikom brisanja pregleda!'], 500);
        }
    }

    public function saveNewExamination(Request $request)
    {
        try {
            $id = $request->id;
            $user_id = Auth::user()->id;
            $examinationDate = $request->examinationDate;
            $examinationDescription = $request->examinationDescription;

            $query = new Patient();
            $addExamination = $query->saveNewExamination(
                $id,
                $user_id,
                $examinationDate,
                $examinationDescription,
            );
            return json_encode($addExamination, 200);
        } catch (Exception $ex) {
            dd($ex->getMessage());
            return response() - json_encode(['error' => 'Greska prilikom dodavanja novog pregleda.'], 500);
        }
    }

    public function getExaminationData(Request $request)
    {
        try {
            $id = $request->id;

            $getData = new Patient();
            $data = $getData->getExaminationData($id);

            return response()->json(['data' => $data], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Greška prilikom uzimanja podataka o pregledu!'], 500);
        }
    }

    public function updateExamination(Request $request)
    {
        try {
            $id = $request->id;
            $examinationDate = $request->examinationDateEdit;
            $examinationDescription = $request->examinationDescriptionEdit;

            $updateExamination = new Patient();
            $updateExamination->updateExamination($id, $examinationDate, $examinationDescription);

            return response()->json(['message' => 'Uspesno izmenjeni podaci o pregledu.'], 200);

        } catch (Exception $ex) {
            return response()->json(['error' => 'Greska prilikom izmene podataka o pregledu.'], 500);
        }
    }
}
