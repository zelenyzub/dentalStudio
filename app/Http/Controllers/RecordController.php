<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Record;

class RecordController extends Controller
{
    public function record()
    {
        return view('kartoni');
    }
    public function recordTable(Request $request)
    {
        try {
            $getRecord = new Record();
            $modelData = $getRecord->recordTable($request);

            $data['draw'] = $request->input('draw');
            $data['recordsFiltered'] = $modelData['recordsFiltered'];
            $data['recordsTotal'] = count($modelData['recordsTotal']);
            $data['data'] = $modelData['data'];

            return json_encode($data, 200);
        } catch (Exception $ex) {
            return response() - json_encode(['error' => 'Greska prilikom ucitavanja tabele kartona.'], 500);
        }
    }

    public function patientData(Request $request)
    {
        try {
            $id = $request->patientID;
            $patientInfo = new Record();
            $data = $patientInfo->patientData($id);

            return response()->json(['data' => $data], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Greška prilikom uzimanja podataka o pacijentu!'], 500);
        }

    }

    public function deletePatient(Request $request) {
        try {
            $id = $request->patientID;
            $deleteRecord = new Record();
            $deleteRecord->deleteRecord($id);

            return response()->json(['message' => 'Uspesno obrisan karton'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Greška prilikom brisanja kartona!'], 500);
        }
    }
}
