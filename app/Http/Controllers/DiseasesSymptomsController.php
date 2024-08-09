<?php

namespace App\Http\Controllers;

use App\Models\Diseases_Symptoms;
use App\Http\Requests\StoreDiseases_SymptomsRequest;
use App\Http\Requests\UpdateDiseases_SymptomsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiseasesSymptomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id1 = $request->post('id1');
        $id2 = $request->post('id2');
        $id3 = $request->post('id3');

        $query = "SELECT d.disease_name
        FROM diseases d
        JOIN disease_symptoms ds ON d.id = ds.disease_id
        WHERE ds.symptom_id IN (?, ?, ?)
        GROUP BY d.id
        HAVING COUNT(DISTINCT ds.symptom_id) = 3";

        $results = DB::select($query, [$id1, $id2, $id3]);

        if (isset($id1) && isset($id2) && isset($id3)) {
            if (empty($results)) {
                $response = [
                    'status' => [
                        'code' => '200',
                        'description' => 'Request Valid.',
                    ],
                    'results' => [
                        'results' => 'Unable to predict disease.',
                    ]
                ];

                return response()->json($response);
            } else {
                $response = [
                    'status' => [
                        'code' => '200',
                        'description' => 'Request Valid.',
                    ],
                    'results' => $results,
                ];

                return response()->json($response);
            }
        } else {
            $response = [
                'status' => [
                    'code' => '200',
                    'description' => 'Request Valid.',
                ],
                'results' => [
                    'error' => 'Lack of Inputs.',
                ],
            ];

            return response()->json($response);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiseases_SymptomsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Diseases_Symptoms $diseases_Symptoms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diseases_Symptoms $diseases_Symptoms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiseases_SymptomsRequest $request, Diseases_Symptoms $diseases_Symptoms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diseases_Symptoms $diseases_Symptoms)
    {
        //
    }
}
