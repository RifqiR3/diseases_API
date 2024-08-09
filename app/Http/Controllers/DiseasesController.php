<?php

namespace App\Http\Controllers;

use App\Models\Diseases;
use App\Http\Requests\StoreDiseasesRequest;
use App\Http\Requests\UpdateDiseasesRequest;
use App\Transformers\Transformers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiseasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $diseases =  Diseases::all();
        $id = $request->input('id');

        if ($id) {
            $query = "SELECT s.symptom_name
            FROM symptoms s
            JOIN disease_symptoms ds ON s.id = ds.symptom_id
            JOIN diseases d ON d.id = ds.disease_id
            WHERE d.id = ?";
            $results = DB::select($query, [$id]);

            $query2 = "SELECT disease_name FROM diseases WHERE id = ?";
            $results2 = DB::select($query2, [$id]);
            // $results2_d = $results2[0]->disease_name[0]->disease_name;
            // echo '<pre>';
            // print_r($results2);
            // echo '</pre>';

            // dd($results2);
            if (empty($results)) {
                $response = [
                    'query' => [
                        'id_disease' => $id,
                    ],
                    'status' => [
                        'code' => '200',
                        'description' => 'Request Valid.',
                    ],
                    'results' => [
                        'error' => 'Disease not found.',
                    ],
                ];
                return response()->json($response);
            } else {
                $response = [
                    'query' => [
                        'id_disease' => $id,
                        'disease_name' => $results2[0]->disease_name,
                    ],
                    'status' => [
                        'code' => '200',
                        'description' => 'Request Valid',
                    ],
                    'results' => $results,
                ];

                return response()->json($response);
            }
        } else {
            $response = [
                'status' => [
                    'code' => '200',
                    'description' => 'Request Valid',
                ],
                'results' => $diseases,
            ];
            return response()->json($response);
        }
    }

    public function filterDiseases(Request $request)
    {
        $id = $request->post('id');
        $query = "SELECT s.symptom_name
        FROM symptoms s
        JOIN disease_symptoms ds ON s.id = ds.symptom_id
        JOIN diseases d ON d.id = ds.disease_id
        WHERE d.id = ?";
        $results = DB::select($query, [$id]);

        if (isset($id)) {
            if (empty($results)) {
                $response = [
                    'status' => [
                        'code' => '200',
                        'description' => 'Request Valid.',
                    ],
                    'results' => [
                        'error' => 'Disease not found.',
                    ],
                ];
                return response()->json($response);
            } else {
                $response = [
                    'status' => [
                        'code' => '200',
                        'description' => 'Request Valid',
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

    public function filterDiseases2(Request $request)
    {

        $id = $request->post('id');

        $query = "SELECT * FROM diseases WHERE id = ?";
        $results = DB::select($query, [$id]);

        // $transformer = new Transformers();
        // $transformedData = [];

        // foreach ($results as $result) {
        //     $transformedData[] = $transformer->transform_diseases($result);
        // }

        $response = [
            'status' => [
                'code' => '400',
                'description' => 'Request Valid',
            ],
            'results' => $results,
        ];

        return response()->json($response);
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
    public function store(StoreDiseasesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Diseases $diseases)
    {
        return $diseases;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diseases $diseases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiseasesRequest $request, Diseases $diseases)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diseases $diseases)
    {
        //
    }
}
